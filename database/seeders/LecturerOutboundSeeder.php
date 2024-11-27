<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturerOutboundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturerOutboundData = [
            [
                'Partner_Lecturer_Name' => 'Dr. Yasir Siddiqui',
                'Gender' => 'L', // L = Laki-laki
                'Role' => 'Dosen Tamu',
                'University_Origin' => 'Jouf University, Saudi Arabia',
                'Activity_Year' => 2024,
                'ID_Program' => 6, // Teknik Informatika
                'ID_Activity' => 6, // Informatics Global Coding Hackathon
            ],
            [
                'Partner_Lecturer_Name' => 'Prof. Sarah Johnson',
                'Gender' => 'P', // P = Perempuan
                'Role' => 'Pembicara Tamu',
                'University_Origin' => 'Harvard University, United States',
                'Activity_Year' => 2024,
                'ID_Program' => 1, // Manajemen
                'ID_Activity' => 1, // Student Exchange Program - Manajemen
            ],
            [
                'Partner_Lecturer_Name' => 'Dr. Klaus Müller',
                'Gender' => 'L',
                'Role' => 'Dosen Peneliti',
                'University_Origin' => 'University of Munich, Germany',
                'Activity_Year' => 2024,
                'ID_Program' => 4, // Pendidikan Dokter
                'ID_Activity' => 4, // Medical Research Symposium
            ],
            [
                'Partner_Lecturer_Name' => 'Dr. Hana Kim',
                'Gender' => 'P',
                'Role' => 'Pembicara Workshop',
                'University_Origin' => 'Seoul National University, South Korea',
                'Activity_Year' => 2024,
                'ID_Program' => 9, // Ilmu Hubungan Internasional
                'ID_Activity' => 7, // International Cultural Exchange
            ],
        ];

        foreach ($lecturerOutboundData as $lecturer) {
            DB::table('lecturer_outbound')->insert([
                'Partner_Lecturer_Name' => $lecturer['Partner_Lecturer_Name'],
                'Gender' => $lecturer['Gender'],
                'Role' => $lecturer['Role'],
                'University_Origin' => $lecturer['University_Origin'],
                'Activity_Year' => $lecturer['Activity_Year'],
                'ID_Program' => $lecturer['ID_Program'],
                'ID_Activity' => $lecturer['ID_Activity'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
