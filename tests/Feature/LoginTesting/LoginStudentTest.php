<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Spatie\Permission\Models\Role;

test('Student can login with valid credentials via API', function () {
    // Data kredensial yang digunakan untuk login
    $usernameOrEmail = env("API_USERNAME_STUDENT");
    $password = env("API_PASSWORD_STUDENT");

    // Mengirimkan request login ke API menggunakan Http::post
    $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login_mahasiswa', [
        'username' => env("API_USERNAME_STUDENT"),
        'password' => env("API_PASSWORD_STUDENT"),
    ]);

    // Memastikan bahwa response API berhasil
    $this->assertTrue($response->successful(), 'API request failed');

    // Mendapatkan data JSON dari response
    $studentData = $response->json();

    // Memeriksa status_login dari respon API
    $statusLogin = $studentData['status_login'] ?? null;

    // Memastikan bahwa status_login bernilai 1
    if ($statusLogin != 1) {
        // Jika status_login tidak valid, lempar exception
        throw ValidationException::withMessages([
            'email' => 'Invalid Student Username or Password!',
        ]);
    }

    // Memastikan status login valid
    $this->assertEquals(1, $statusLogin, 'Invalid login credentials');
});

test('Student cannot login with invalid credentials via API', function () {
    // Data kredensial yang digunakan untuk login
    $usernameOrEmail = env("API_USERNAME_STUDENT");
    $password = '12345678';// Salah

    // Mengirimkan request login ke API menggunakan Http::post
    $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login_mahasiswa', [
        'username' => $usernameOrEmail,
        'password' => $password,
    ]);

    // Memastikan bahwa response API berhasil (HTTP status 200)
    $this->assertTrue($response->successful(), 'API request failed');

    // Mendapatkan data JSON dari response
    $studentData = $response->json();

    // Memeriksa status_login dari respon API
    $statusLogin = $studentData['status_login'] ?? null;

    // Memastikan bahwa status_login bernilai selain 1
    $this->assertNotEquals(1, $statusLogin, 'Login credentials should be invalid');

    // Memastikan error message yang tepat
    $this->assertArrayHasKey('status_login', $studentData);
});


test('Student is redirected to dashboard after successful login', function () {
    // Setup data student
    $student = User::factory()->create([
        'username' => env("API_USERNAME_STUDENT"),
        'password' => bcrypt(env("API_PASSWORD_STUDENT")), // Simulasikan password yang benar
    ]);

    Role::firstOrCreate(['name' => 'student']);
    // Ambil role 'student'
    $role = Role::findByName('student');

    // Menambahkan role 'student' ke pengguna
    $student->assignRole($role);

    // Simulasi login
    $response = $this->post('/login', [
        'email' => env("API_USERNAME_STUDENT"), // Email atau username
        'password' => env("API_PASSWORD_STUDENT"),   // Password yang benar
    ]);

    // Pastikan redirect ke halaman dashboard
    $response->assertRedirect('dashboard');

    // Pastikan user terautentikasi
    $this->assertAuthenticatedAs($student);
});
