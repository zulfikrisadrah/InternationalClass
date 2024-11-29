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
                'study_program_Name' => 'Management',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 1,
            ],
            [
                'study_program_Name' => 'Accounting',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 1,
            ],
            [
                'study_program_Name' => 'Law',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 2,

            ],
            [
                'study_program_Name' => 'Medical Education',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 3,
            ],
            [
                'study_program_Name' => 'Civil Engineering',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 4,
            ],
            [
                'study_program_Name' => 'Informatics Engineering',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 4,
            ],
            [
                'study_program_Name' => 'Architecture Engineering',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 4,
            ],
            [
                'study_program_Name' => 'Geological Engineering',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 4,
            ],
            [
                'study_program_Name' => 'International Relations',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 5,
            ],
            [
                'study_program_Name' => 'Communication Science',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 5,
            ],
            [
                'study_program_Name' => 'Dental Education',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 6,
            ],
            [
                'study_program_Name' => 'Public Health',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 7,
            ],
            [
                'study_program_Name' => 'Nursing Science',
                'degree' => 'Undergraduate',
                'ID_Faculty' => 8,
            ],
        ];


        foreach ($programs as $program) {
            DB::table('study_programs')->insert([
                'study_program_Name' => $program['study_program_Name'],
                'degree' => $program['degree'],
                'study_program_Description' => null,
                'International_Accreditation' => null,
                'ID_Faculty' => $program['ID_Faculty'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
