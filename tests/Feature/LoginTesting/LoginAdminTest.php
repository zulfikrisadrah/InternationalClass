<?php
use App\Models\User;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Role;

test('Admin can login with valid credentials via API', function () {
    $usernameOrEmail = env('API_USERNAME_ADMIN');
    $password = env('API_PASSWORD_ADMIN');

    // Make the POST request to the API for login
    $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login', [
        'username' => $usernameOrEmail,
        'password' => $password,
    ]);

    // Assert the response was successful
    expect($response->successful())->toBeTrue();

    // Get the access token from the response
    $responseData = $response->json();
    $accessToken = $responseData['access_token'] ?? null;

    // Assert the access token is present and valid
    expect($accessToken)->not()->toBeNull();
    expect(strlen($accessToken))->toBeGreaterThan(0);
});

test('Admin cannot login with invalid credentials via API', function () {
    $usernameOrEmail = env("API_USERNAME_ADMIN");
    $password = '123'; // Incorrect password

    // Make the POST request to the API for login
    $response = Http::withOptions(['verify' => false])->post('https://sipakamase.unhas.ac.id:8107/login', [
        'username' => $usernameOrEmail,
        'password' => $password,
    ]);

    // Assert the response status is 401 (Unauthorized)
    expect($response->status())->toBe(401);

    // Get the response data
    $responseData = $response->json();

    // Assert there is no access token in the response
    expect($responseData['access_token'] ?? null)->toBeNull();

    // Assert there is an error message in the response
    expect($responseData)->toHaveKey('msg');
});

test('Admin is redirected to dashboard after successful login', function () {
    // Setup data user
    $user = User::factory()->create([
        'username' => env('API_USERNAME_ADMIN'),
        'password' => bcrypt(env('API_PASSWORD_ADMIN')),
    ]);

    Role::firstOrCreate(['name' => 'admin']);

    // Ambil role 'admin'
    $role = Role::findByName('admin');

    // Menambahkan role 'admin' ke pengguna
    $user->assignRole($role);

    // Simulasi login
    $response = $this->post('/login', [
        'email' => env("API_USERNAME_ADMIN"),
        'password' => env('API_PASSWORD_ADMIN'),
    ]);

    // Pastikan redirect ke halaman dashboard
    $response->assertRedirect('dashboard');

    // Pastikan user terautentikasi
    $this->assertAuthenticatedAs($user);
});
