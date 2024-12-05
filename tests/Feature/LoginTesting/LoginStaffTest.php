<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Spatie\Permission\Models\Role;

test('Staff can login with valid credentials', function () {
    // Data kredensial yang digunakan untuk login
    $username = 'staff_1';  // Username staff dari environment
    $password = '12345678';  // Password staff dari environment

    // Membuat user staff di database, atau mengambil dari database yang sudah ada
    $staff = User::where('username', $username)->first();

    // Jika staff tidak ada, kita buat data staff di database
    if (!$staff) {
        $staff = User::factory()->create([
            'username' => $username,
            'password' => bcrypt($password),  // Enkripsi password dengan bcrypt
        ]);
    }

    // Melakukan login menggunakan Auth::attempt
    $loginSuccess = Auth::attempt([
        'username' => $username,
        'password' => $password,
    ]);

    // Memastikan bahwa login berhasil
    $this->assertTrue($loginSuccess, 'Staff login failed with valid credentials.');

    // Pastikan staff yang login adalah staff yang benar
    $this->assertEquals($staff->id, Auth::id(), 'Logged-in staff does not match the provided username.');
});

test('Staff cannot login with invalid credentials', function () {
    // Data kredensial yang digunakan untuk login
    $username = 'staff_1';  // Username yang tidak ada di database
    $password = '12345678';  // Password yang benar untuk username yang valid
    
    // Membuat user staff di database, atau mengambil dari database yang sudah ada
    $staff = User::where('username', $username)->first();

    // Jika staff tidak ada, kita buat data staff di database
    if (!$staff) {
        $staff = User::factory()->create([
            'username' => $username,
            'password' => bcrypt($password),  // Enkripsi password dengan bcrypt
        ]);
    }

    // Melakukan login menggunakan Auth::attempt
    $loginSuccess = Auth::attempt([
        'username' => $username,
        'password' => 12345677,
    ]);

    // Memastikan bahwa login gagal
    $this->assertFalse($loginSuccess, 'Staff should not be able to login with invalid username.');
});

test('Staff cannot login with unregistered username', function () {
    // Data kredensial yang digunakan untuk login
    $username = 'staff_1';  // Username yang tidak ada di database
    $password = '12345678';  // Password apapun

    // Melakukan login menggunakan Auth::attempt
    $loginSuccess = Auth::attempt([
        'username' => $username,
        'password' => $password,
    ]);

    // Memastikan bahwa login gagal
    $this->assertFalse($loginSuccess, 'Staff should not be able to login with an unregistered username.');
});

test('Staff is redirected to dashboard after successful login', function () {
    // Setup data staff
    $staff = User::factory()->create([
        'username' => 'staff_1', // Ganti dengan username staff yang sesuai
        'password' => bcrypt('12345678'), // Simulasikan password yang benar
    ]);
    Role::firstOrCreate(['name' => 'staff']);
    // Ambil role 'staff'
    $role = Role::findByName('staff');

    // Menambahkan role 'staff' ke pengguna
    $staff->assignRole($role);

    // Simulasi login
    $response = $this->post('/login', [
        'email' => 'staff_1', // Username yang benar
        'password' => '12345678', // Password yang benar
    ]);

    // Pastikan redirect ke halaman dashboard
    $response->assertRedirect('dashboard');

    // Pastikan user terautentikasi
    $this->assertAuthenticatedAs($staff);
});


