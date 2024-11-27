<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IeActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $activities = [
            [
                'Activity_Name' => 'Student Exchange Program - Manajemen',
                'Country_of_Execution' => 'United States',
                'Execution_Date' => '2024-05-10',
                'Participants_Count' => 20,
                'ID_Program' => 1, // Manajemen
            ],
            [
                'Activity_Name' => 'Global Accounting Seminar',
                'Country_of_Execution' => 'United Kingdom',
                'Execution_Date' => '2024-06-15',
                'Participants_Count' => 25,
                'ID_Program' => 2, // Akuntansi
            ],
            [
                'Activity_Name' => 'Legal Studies Collaboration Program',
                'Country_of_Execution' => 'Netherlands',
                'Execution_Date' => '2024-07-20',
                'Participants_Count' => 15,
                'ID_Program' => 3, // Ilmu Hukum
            ],
            [
                'Activity_Name' => 'Medical Research Symposium',
                'Country_of_Execution' => 'Germany',
                'Execution_Date' => '2024-08-25',
                'Participants_Count' => 30,
                'ID_Program' => 4, // Pendidikan Dokter
            ],
            [
                'Activity_Name' => 'Engineering Workshop: Smart Cities',
                'Country_of_Execution' => 'Japan',
                'Execution_Date' => '2024-09-10',
                'Participants_Count' => 35,
                'ID_Program' => 5, // Teknik Sipil
            ],
            [
                'Activity_Name' => 'Informatics Global Coding Hackathon',
                'Country_of_Execution' => 'India',
                'Execution_Date' => '2024-10-05',
                'Participants_Count' => 40,
                'ID_Program' => 6, // Teknik Informatika
            ],
            [
                'Activity_Name' => 'International Cultural Exchange',
                'Country_of_Execution' => 'South Korea',
                'Execution_Date' => '2024-11-12',
                'Participants_Count' => 50,
                'ID_Program' => 9, // Ilmu Hubungan Internasional
            ],
            [
                'Activity_Name' => 'Nursing Workshop on Global Healthcare',
                'Country_of_Execution' => 'Australia',
                'Execution_Date' => '2024-12-20',
                'Participants_Count' => 18,
                'ID_Program' => 13, // Ilmu Keperawatan
            ],
        ];

        foreach ($activities as $activity) {
            DB::table('ie_activities')->insert([
                'Activity_Name' => $activity['Activity_Name'],
                'Country_of_Execution' => $activity['Country_of_Execution'],
                'Execution_Date' => $activity['Execution_Date'],
                'Participants_Count' => $activity['Participants_Count'],
                'ID_Program' => $activity['ID_Program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
