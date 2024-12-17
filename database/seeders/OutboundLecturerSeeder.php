<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OutboundLecturer;

class OutboundLecturerSeeder extends Seeder
{
    /**
     * Seed the database with outbound lecturer data.
     *
     * @return void
     */
    public function run()
    {
        OutboundLecturer::create([
            'lecturer_name' => 'Dr. John Doe',
            'gender' => 'Male',
            'role_in_ki' => 'Lecturer',
            'university_name' => 'ABC University',
            'activity_year' => '2024',
            'ID_study_program' => 1, 
        ]);

        OutboundLecturer::create([
            'lecturer_name' => 'Prof. Jane Smith',
            'gender' => 'Female',
            'role_in_ki' => 'Professor',
            'university_name' => 'XYZ University',
            'activity_year' => '2025',
            'ID_study_program' => 2, 
        ]);

        OutboundLecturer::create([
            'lecturer_name' => 'Dr. Alice Brown',
            'gender' => 'Female',
            'role_in_ki' => 'Lecturer',
            'university_name' => 'PQR University',
            'activity_year' => '2026',
            'ID_study_program' => 3, 
        ]);
    }
}
