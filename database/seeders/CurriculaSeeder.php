<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CurriculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $curricula = [
            [
                'Total_Courses' => 40,
                'Total_English_RPS' => 30,
                'Total_English_Learning_Materials' => 25,
                'Total_Courses_Taught_In_English' => 10,
                'Total_Courses_In_School' => 40,
                'ID_Program' => 1, // Manajemen
            ],
            [
                'Total_Courses' => 45,
                'Total_English_RPS' => 35,
                'Total_English_Learning_Materials' => 30,
                'Total_Courses_Taught_In_English' => 15,
                'Total_Courses_In_School' => 45,
                'ID_Program' => 2, // Akuntansi
            ],
            [
                'Total_Courses' => 50,
                'Total_English_RPS' => 10,
                'Total_English_Learning_Materials' => 5,
                'Total_Courses_Taught_In_English' => 2,
                'Total_Courses_In_School' => 50,
                'ID_Program' => 3, // Ilmu Hukum
            ],
            [
                'Total_Courses' => 60,
                'Total_English_RPS' => 20,
                'Total_English_Learning_Materials' => 15,
                'Total_Courses_Taught_In_English' => 5,
                'Total_Courses_In_School' => 60,
                'ID_Program' => 4, // Pendidikan Dokter
            ],
            [
                'Total_Courses' => 55,
                'Total_English_RPS' => 25,
                'Total_English_Learning_Materials' => 20,
                'Total_Courses_Taught_In_English' => 8,
                'Total_Courses_In_School' => 55,
                'ID_Program' => 5, // Teknik Sipil
            ],
            [
                'Total_Courses' => 50,
                'Total_English_RPS' => 30,
                'Total_English_Learning_Materials' => 28,
                'Total_Courses_Taught_In_English' => 12,
                'Total_Courses_In_School' => 50,
                'ID_Program' => 6, // Teknik Informatika
            ],
            [
                'Total_Courses' => 48,
                'Total_English_RPS' => 18,
                'Total_English_Learning_Materials' => 16,
                'Total_Courses_Taught_In_English' => 6,
                'Total_Courses_In_School' => 48,
                'ID_Program' => 7, // Teknik Arsitektur
            ],
            // Tambahkan data kurikulum untuk program lainnya jika diperlukan.
        ];

        foreach ($curricula as $curriculum) {
            DB::table('curricula')->insert([
                'Total_Courses' => $curriculum['Total_Courses'],
                'Total_English_RPS' => $curriculum['Total_English_RPS'],
                'Total_English_Learning_Materials' => $curriculum['Total_English_Learning_Materials'],
                'Total_Courses_Taught_In_English' => $curriculum['Total_Courses_Taught_In_English'],
                'Total_Courses_In_School' => $curriculum['Total_Courses_In_School'],
                'ID_Program' => $curriculum['ID_Program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
