<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class LoginRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'string'], // Bisa berupa email, username, atau NIM
            'password' => ['required', 'string'],
        ];
    }

    public function authenticate(): void
    {
        $this->ensureIsNotRateLimited();

        $usernameOrEmail = $this->input('email'); // Bisa email, username, atau NIM
        $password = $this->input('password');

        // Login untuk admin
        if ($usernameOrEmail === 'admin') {
            $this->authenticateAdmin($usernameOrEmail, $password);
        } else {
            // Login user biasa (email atau username)
            $this->authenticateUserOrStaff($usernameOrEmail, $password);
        }

        RateLimiter::clear($this->throttleKey());
    }

    private function authenticateAdmin(string $username, string $password): void
    {
        // Panggil API login untuk admin
        $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login', [
            'username' => $username,
            'password' => $password,
        ]);
    
        if (!$response->successful()) {
            throw ValidationException::withMessages([
                'email' => 'Invalid Admin Username or Password!',
            ]);
        }
    
        $accessToken = $response->json('access_token');
        if (!$accessToken) {
            throw ValidationException::withMessages([
                'email' => 'Failed to retrieve access token!',
            ]);
        }
    
        // Simpan token API di sesi
        Session::put('access_token', $accessToken);
    
        // Generate email sesuai dengan username
        $email = "{$username}@gmail.com";
    
        // Cek apakah user admin sudah ada atau buat jika belum
        $adminUser = \App\Models\User::firstOrCreate(
            ['username' => "admin"],
            [
                'name' => ucfirst($username), // Gunakan username dengan huruf pertama kapital sebagai nama
                'email' => $email, // Email sesuai username
                'password' => bcrypt($password), // Password di-hash
            ]
        );
    
        // Tetapkan role admin jika belum ada
        if (!$adminUser->hasRole('admin')) {
            $adminUser->assignRole('admin'); // Pastikan Spatie/Laravel-Permission digunakan
        }
    
        // Login admin
        Auth::login($adminUser);
    
        // Tetapkan role untuk sesi
        session(['role' => 'admin']);
    }

    private function authenticateUserOrStaff(string $usernameOrEmail, string $password): void
    {
        // Cek user di database lokal
        $user = \App\Models\User::where('username', $usernameOrEmail)->orWhere('email', $usernameOrEmail)->first();
    
        if ($user) {
            // Jika user ditemukan, verifikasi password dan role
            if (\Hash::check($password, $user->password)) {
                $this->processUserRole($user); // Proses autentikasi berdasarkan role
            } else {
                throw ValidationException::withMessages([
                    'email' => 'Invalid Username or Password!',
                ]);
            }
        } else {
            // Jika tidak ditemukan di database lokal, asumsikan mahasiswa
            $this->authenticateStudentViaAPI($usernameOrEmail, $password);
        }
    }
    
    private function authenticateStudentViaAPI(string $usernameOrEmail, string $password): void
    {
        // Panggil API login_mahasiswa untuk autentikasi mahasiswa
        $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login_mahasiswa', [
            'username' => $usernameOrEmail,
            'password' => $password,
        ]);
    
        if ($response->successful()) {
            $studentData = $response->json();
    
            // Buat akun mahasiswa di database lokal jika data valid dari API
            // Data name dan email masih belum bisa ambil dari API
            $user = \App\Models\User::create([
                'username' => $usernameOrEmail,
                'password' => bcrypt($password), // Set password yang di-hash
                'name' => ucfirst($usernameOrEmail), // Bisa menggunakan username untuk nama
                'email' => "{$usernameOrEmail}@gmail.com", // Tentukan email sesuai dengan username
            ]);
    
            // Tetapkan role mahasiswa jika belum ada
            if (!$user->hasRole('student')) {
                $user->assignRole('student');
            }
    
            // Login mahasiswa
            Auth::login($user);
            session(['role' => 'student']);
        } else {
            // Jika API gagal atau data tidak valid
            throw ValidationException::withMessages([
                'email' => 'Invalid Student Username or Password!',
            ]);
        }
    }
    
    private function processUserRole($user): void
    {
        // Proses login berdasarkan role
        if ($user->hasRole('staff')) {
            Auth::login($user);
            session(['role' => 'staff']); // Set session role ke staff
        } elseif ($user->hasRole('student')) {
            Auth::login($user);
            session(['role' => 'student']); // Set session role ke student
        } else {
            throw ValidationException::withMessages([
                'email' => 'User does not have a valid role!',
            ]);
        }
    }
    

    public function ensureIsNotRateLimited(): void
    {
        if (!RateLimiter::tooManyAttempts($this->throttleKey(), 5)) {
            return;
        }

        event(new Lockout($this));

        $seconds = RateLimiter::availableIn($this->throttleKey());

        throw ValidationException::withMessages([
            'email' => trans('auth.throttle', [
                'seconds' => $seconds,
                'minutes' => ceil($seconds / 60),
            ]),
        ]);
    }

    public function throttleKey(): string
    {
        return Str::transliterate(Str::lower($this->string('email')).'|'.$this->ip());
    }
}
