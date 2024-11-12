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
        $managerRole = Role::create(['name' => 'manager']);
        $studentRole = Role::create(['name' => 'student']);

        $adminRole = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '123',
        ]);

        $adminRole->assignRole('admin');
    }
}
