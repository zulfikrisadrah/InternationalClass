<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'study_program_Name' => 'PENDIDIKAN DOKTER - S1',
                'faculty_name' => 'KEDOKTERAN',
            ],
            [
                'study_program_Name' => 'PENDIDIKAN DOKTER GIGI - S1',
                'faculty_name' => 'PENDIDIKAN DOKTER GIGI',
            ],
            [
                'study_program_Name' => 'ILMU KEPERAWATAN - S1',
                'faculty_name' => 'KEPERAWATAN',
            ],
            [
                'study_program_Name' => 'KESEHATAN MASYARAKAT - S1',
                'faculty_name' => 'KESEHATAN MASYARAKAT',
            ],
            [
                'study_program_Name' => 'TEKNIK SIPIL - S1',
                'faculty_name' => 'TEKNIK',
            ],
            [
                'study_program_Name' => 'TEKNIK INFORMATIKA - S1',
                'faculty_name' => 'TEKNIK',
            ],
            [
                'study_program_Name' => 'TEKNIK ARSITEKTUR - S1',
                'faculty_name' => 'TEKNIK',
            ],
            [
                'study_program_Name' => 'TEKNIK GEOLOGI - S1',
                'faculty_name' => 'TEKNIK',
            ],
            [
                'study_program_Name' => 'ILMU HUKUM - S1',
                'faculty_name' => 'HUKUM',
            ],
            [
                'study_program_Name' => 'ILMU HUBUNGAN INTERNASIONAL - S1',
                'faculty_name' => 'ILMU SOSIAL DAN ILMU POLITIK',
            ],
            [
                'study_program_Name' => 'ILMU KOMUNIKASI - S1',
                'faculty_name' => 'ILMU SOSIAL DAN ILMU POLITIK',
            ],
            [
                'study_program_Name' => 'MANAJEMEN - S1',
                'faculty_name' => 'EKONOMI',
            ],
            [
                'study_program_Name' => 'AKUTANSI - S1',
                'faculty_name' => 'EKONOMI',
            ],
        ];


        foreach ($programs as $program) {
            $faculty = DB::table('faculties')->where('Faculty_Name', $program['faculty_name'])->first();

            if ($faculty) {
                DB::table('study_programs')->insert([
                    'study_program_Name' => $program['study_program_Name'],
                    'degree' => 'Undergraduate',
                    'study_program_Description' => null,
                    'International_Accreditation' => null,
                    'ID_Faculty' => $faculty->ID_Faculty,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "Fakultas '{$program['faculty_name']}' tidak ditemukan.\n";
            }
        }
    }
}
