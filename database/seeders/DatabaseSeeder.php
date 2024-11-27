<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermissionSeeder::class,
            StaffSeeder::class,
            FacultySeeder::class,
            DegreeSeeder::class,
            ProgramSeeder::class,
            StudentSeeder::class,
            NewsSeeder::class,
            IeActivitySeeder::class,
            LecturerSeeder::class,
            CourseSeeder::class,
            CollaborationSeeder::class,
            LecturerOutboundSeeder::class,
            CurriculaSeeder::class,
            EventSeeder::class
        ]);
    }
}
