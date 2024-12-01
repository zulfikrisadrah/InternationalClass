<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FacultySeeder extends Seeder
{
    public function run(): void
    {
        $faculties = [
            ['Faculty_Name' => 'EKONOMI', 'Faculty_Code' => 'A'],
            ['Faculty_Name' => 'HUKUM', 'Faculty_Code' => 'B'],
            ['Faculty_Name' => 'KEDOKTERAN', 'Faculty_Code' => 'C'],
            ['Faculty_Name' => 'TEKNIK', 'Faculty_Code' => 'D'],
            ['Faculty_Name' => 'ILMU SOSIAL DAN ILMU POLITIK', 'Faculty_Code' => 'E'],
            ['Faculty_Name' => 'ILMU BUDAYA', 'Faculty_Code' => 'F'],
            ['Faculty_Name' => 'PERTANIAN', 'Faculty_Code' => 'G'],
            ['Faculty_Name' => 'MATEMATIKA DAN ILMU PENG. ALAM', 'Faculty_Code' => 'H'],
            ['Faculty_Name' => 'PETERNAKAN', 'Faculty_Code' => 'I'],
            ['Faculty_Name' => 'PENDIDIKAN DOKTER GIGI', 'Faculty_Code' => 'J'],
            ['Faculty_Name' => 'KESEHATAN MASYARAKAT', 'Faculty_Code' => 'K'],
            ['Faculty_Name' => 'ILMU KELAUTAN DAN PERIKANAN', 'Faculty_Code' => 'L'],
            ['Faculty_Name' => 'KEHUTANAN', 'Faculty_Code' => 'M'],
            ['Faculty_Name' => 'FARMASI', 'Faculty_Code' => 'N'],
            ['Faculty_Name' => 'KEPERAWATAN', 'Faculty_Code' => 'R'],
        ];

        foreach ($faculties as $faculty) {
            DB::table('faculties')->insert([
                'Faculty_Name' => $faculty['Faculty_Name'],
                'Faculty_Code' => $faculty['Faculty_Code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
