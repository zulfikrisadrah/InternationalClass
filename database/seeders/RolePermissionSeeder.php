<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $staffRole = Role::create(['name' => 'staff']);
        $studentRole = Role::create(['name' => 'student']);

        $adminRole = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
        ]);

        $staffRole = User::create([
            'name' => 'staff',
            'email' => 'staff@gmail.com',
            'password' => '123',
        ]);

        $studentRole = User::create([
            'name' => 'student',
            'email' => 'student@gmail.com',
            'password' => '123',
        ]);

        $adminRole->assignRole('admin');
        $staffRole->assignRole('staff');
        $studentRole->assignRole('student');
    }
}
