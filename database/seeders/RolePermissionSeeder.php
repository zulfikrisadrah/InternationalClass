<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Staff;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Mendefinisikan daftar permission
        $permissions = [
            'manage news',
            'manage event',
            'manage program',
            'manage class',
            'choose program',
            'manage user',
        ];

        // Membuat permission jika belum ada
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        // Membuat peran 'admin' dan menetapkan pengguna
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $adminRole->syncPermissions(Permission::all());

        $this->createAdmin();

        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $staffPermissions = [
            'manage news',
            'manage event',
            'manage program',
            'manage class',
            'manage user',
        ];
        $staffRole->syncPermissions($staffPermissions); // Menyinkronkan izin untuk peran staff
        
        Role::firstOrCreate(['name' => 'student']);
    }

    private function createAdmin(): void
    {
        $loginResponse = Http::withOptions(['verify' => false])
            ->post('https://sipakamase.unhas.ac.id:8107/login', [
                'username' => 'admin',
                'password' => 'UnhasTamalanreaMakassar',
            ]);

        if ($loginResponse->successful()) {
            $loginData = $loginResponse->json();
            $accessToken = $loginData['access_token'] ?? null;

            if ($accessToken) {
                $email = 'admin@gmail.com';

                $adminUser = User::firstOrCreate(
                    ['username' => 'admin'],
                    [
                        'name' => 'Admin',
                        'email' => $email,
                        'password' => Hash::make('adminPassword'),
                    ]
                );

                if (!$adminUser->hasRole('admin')) {
                    $adminUser->assignRole('admin');
                }
            } else {
                Log::error('Failed to retrieve access token for admin creation');
            }
        } else {
            Log::error('Login failed for admin creation API');
        }
    }
}
