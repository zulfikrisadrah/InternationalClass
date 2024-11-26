<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'manage news',
            'manage event',
            'manage program',
            'manage class',
        ];

        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm]);
        }

        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $user->assignRole('admin');

        $staffRole = Role::firstOrCreate(['name' => 'staff']);
        $staffPermissions = [
            'manage news',
            'manage event',
            'manage program',
        ];
        $staffRole = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $staffRole->syncPermissions($staffPermissions);

        $studentRole = Role::firstOrCreate(['name' => 'student']);
        $studentRole = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => bcrypt('123'),
        ]);
        $studentRole->assignRole('student');
    }
}
