<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LectureScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $schedules = [
            // Jadwal untuk Manajemen
            [
                'Day' => 'Monday',
                'Start_Time' => '08:00:00',
                'End_Time' => '10:00:00',
                'ID_Lecturer' => 1, // Prof. Dr. Ir. Mardiana E. Fachry, MS.
                'ID_Course' => 1, // Pengantar Manajemen
            ],
            [
                'Day' => 'Wednesday',
                'Start_Time' => '10:00:00',
                'End_Time' => '12:00:00',
                'ID_Lecturer' => 1,
                'ID_Course' => 2, // Manajemen Keuangan
            ],

            // Jadwal untuk Akuntansi
            [
                'Day' => 'Tuesday',
                'Start_Time' => '08:00:00',
                'End_Time' => '10:00:00',
                'ID_Lecturer' => 2, // Prof. Dr. Siti Aminah, M.Sc.
                'ID_Course' => 4, // Pengantar Akuntansi
            ],
            [
                'Day' => 'Thursday',
                'Start_Time' => '13:00:00',
                'End_Time' => '15:00:00',
                'ID_Lecturer' => 2,
                'ID_Course' => 5, // Akuntansi Biaya
            ],

            // Jadwal untuk Ilmu Hukum
            [
                'Day' => 'Friday',
                'Start_Time' => '08:00:00',
                'End_Time' => '10:00:00',
                'ID_Lecturer' => 3, // Dr. Rahmat Hidayat, S.H., M.H.
                'ID_Course' => 7, // Hukum Pidana
            ],
            [
                'Day' => 'Friday',
                'Start_Time' => '10:00:00',
                'End_Time' => '12:00:00',
                'ID_Lecturer' => 3,
                'ID_Course' => 8, // Hukum Perdata
            ],

            // Jadwal untuk Pendidikan Dokter
            [
                'Day' => 'Monday',
                'Start_Time' => '13:00:00',
                'End_Time' => '15:00:00',
                'ID_Lecturer' => 4, // Prof. Dr. Wulan Pertiwi, Sp.KK.
                'ID_Course' => 10, // Anatomi Manusia
            ],
            [
                'Day' => 'Wednesday',
                'Start_Time' => '08:00:00',
                'End_Time' => '10:00:00',
                'ID_Lecturer' => 4,
                'ID_Course' => 12, // Farmakologi
            ],
        ];

        foreach ($schedules as $schedule) {
            DB::table('lecture_schedule')->insert([
                'Day' => $schedule['Day'],
                'Start_Time' => $schedule['Start_Time'],
                'End_Time' => $schedule['End_Time'],
                'ID_Lecturer' => $schedule['ID_Lecturer'],
                'ID_Course' => $schedule['ID_Course'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
