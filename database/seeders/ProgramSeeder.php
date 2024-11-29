<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'Program_Name' => 'Student Exchange Program - Manajemen',
                'Country_of_Execution' => 'United States',
                'Execution_Date' => '2024-05-10',
                'Participants_Count' => 20,
                'ID_Ie_program' => 1,
            ],
            [
                'Program_Name' => 'Global Accounting Seminar',
                'Country_of_Execution' => 'United Kingdom',
                'Execution_Date' => '2024-06-15',
                'Participants_Count' => 25,
                'ID_Ie_program' => 2,
            ],
            [
                'Program_Name' => 'Legal Studies Collaboration Program',
                'Country_of_Execution' => 'Netherlands',
                'Execution_Date' => '2024-07-20',
                'Participants_Count' => 15,
                'ID_Ie_program' => 3,
            ],
            [
                'Program_Name' => 'Medical Research Symposium',
                'Country_of_Execution' => 'Germany',
                'Execution_Date' => '2024-08-25',
                'Participants_Count' => 30,
                'ID_Ie_program' => 4,
            ],
            [
                'Program_Name' => 'Engineering Workshop: Smart Cities',
                'Country_of_Execution' => 'Japan',
                'Execution_Date' => '2024-09-10',
                'Participants_Count' => 35,
                'ID_Ie_program' => 1,
            ],
            [
                'Program_Name' => 'Informatics Global Coding Hackathon',
                'Country_of_Execution' => 'India',
                'Execution_Date' => '2024-10-05',
                'Participants_Count' => 40,
                'ID_Ie_program' => 2,
            ],
            [
                'Program_Name' => 'International Cultural Exchange',
                'Country_of_Execution' => 'South Korea',
                'Execution_Date' => '2024-11-12',
                'Participants_Count' => 50,
                'ID_Ie_program' => 3,
            ],
            [
                'Program_Name' => 'Nursing Workshop on Global Healthcare',
                'Country_of_Execution' => 'Australia',
                'Execution_Date' => '2024-12-20',
                'Participants_Count' => 18,
                'ID_Ie_program' => 4,
            ],
        ];

        foreach ($programs as $program) {
            DB::table('programs')->insert([
                'Program_Name' => $program['Program_Name'],
                'Country_of_Execution' => $program['Country_of_Execution'],
                'Execution_Date' => $program['Execution_Date'],
                'Participants_Count' => $program['Participants_Count'],
                'ID_Ie_program' => $program['ID_Ie_program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
