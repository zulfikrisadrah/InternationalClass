<?php

namespace App\Http\Requests\Auth;

use Illuminate\Auth\Events\Lockout;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Faculty;
use App\Models\StudyProgram;

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
            if (Hash::check($password, $user->password)) {
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
        // Ambil token akses dengan memanggil loginAndGetToken
        $tokenResponse = $this->loginAndGetToken();

        // Cek apakah token berhasil didapat
        if ($tokenResponse['status'] != 200) {
            throw ValidationException::withMessages([
                'email' => 'Login failed: ' . $tokenResponse['message'],
            ]);
        }

        $accessToken = $tokenResponse['access_token'];

        // Panggil API login_mahasiswa untuk autentikasi mahasiswa
        $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login_mahasiswa', [
            'username' => $usernameOrEmail,
            'password' => $password,
        ]);

        // Cek apakah respon API berhasil
        if ($response->successful()) {
            $studentData = $response->json();

            // Periksa status_login dari respon API
            $statusLogin = $studentData['status_login'] ?? null;

            if ($statusLogin != 1) {
                // Jika status_login tidak valid, lempar exception
                throw ValidationException::withMessages([
                    'email' => 'Invalid Student Username or Password!',
                ]);
            }

            // Ambil NIM dari data login mahasiswa
            $nim = $usernameOrEmail;

            // Panggil API untuk mendapatkan data mahasiswa berdasarkan NIM dengan menggunakan access token
            $mahasiswaResponse = Http::withOptions(['verify' => false])
                ->withHeaders([
                    'Authorization' => 'Bearer ' . $accessToken
                ])
                ->withBody(json_encode([
                    'nim' => $nim,
                ]), 'application/json')
                ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');

            // Cek apakah respon API untuk data mahasiswa berhasil
            if ($mahasiswaResponse->successful()) {
                $mahasiswaData = $mahasiswaResponse->json();

                // Ambil nama_mahasiswa dan email dari data mahasiswa
                $namaMahasiswa = $mahasiswaData['mahasiswas'][0]['nama_mahasiswa'] ?? 'No Name';
                $emailMahasiswa = $mahasiswaData['mahasiswas'][0]['email'] ?? "{$usernameOrEmail}@unhas.ac.id";

                $facultyCode = substr($nim, 0, 1); 
                $faculty = Faculty::where('Faculty_Code', $facultyCode)->first();

                if (!$faculty) {
                    throw ValidationException::withMessages([
                        'email' => 'Faculty not found for the given code.',
                    ]);
                }

                $programName = $mahasiswaData['mahasiswas'][0]['prodi']['nama_resmi'];

                StudyProgram::firstOrCreate(
                    ['study_program_Name' => $programName],
                    [
                        'degree' => 'Undergraduate', 
                        'study_program_Description' => null,
                        'International_Accreditation' => null,
                        'ID_Faculty' => $faculty->ID_Faculty,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );

                // Buat akun mahasiswa di database lokal jika status_login = 1
                $user = \App\Models\User::create([
                    'username' => $usernameOrEmail,
                    'password' => bcrypt($password), // Set password yang di-hash
                    'name' => ucfirst($namaMahasiswa), // Gunakan nama mahasiswa
                    'email' => $emailMahasiswa, // Gunakan email yang didapat dari API
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
                    'email' => 'Failed to retrieve student data!',
                ]);
            }
        } else {
            // Jika API gagal autentikasi
            throw ValidationException::withMessages([
                'email' => 'Invalid Student Username or Password!',
            ]);
        }
    }

    private function loginAndGetToken()
    {
        // Melakukan POST request untuk login
        $loginResponse = Http::withOptions(['verify' => false])
            ->post('https://sipakamase.unhas.ac.id:8107/login', [
                'username' => 'admin', // Gantilah dengan username yang benar
                'password' => 'UnhasTamalanreaMakassar', // Gantilah dengan password yang benar
            ]);

        // Jika login berhasil, ambil token
        if ($loginResponse->successful()) {
            $loginData = $loginResponse->json();

            if (isset($loginData['access_token'])) {
                return [
                    'status' => $loginResponse->status(),  // Status HTTP (200 jika berhasil)
                    'access_token' => $loginData['access_token'],
                    'message' => 'Login berhasil',
                ];
            } else {
                return [
                    'status' => $loginResponse->status(),
                    'message' => 'Access token tidak ditemukan.',
                ];
            }
        } else {
            return [
                'status' => $loginResponse->status(),
                'message' => 'Login gagal. Status: ' . $loginResponse->status(),
            ];
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
        return Str::transliterate(Str::lower($this->input('email'))) . '|' . $this->ip();
    }
}
