<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $courses = [
            // Manajemen
            ['Course_Name' => 'Pengantar Manajemen', 'Credits' => 3, 'ID_Program' => 1],
            ['Course_Name' => 'Manajemen Keuangan', 'Credits' => 3, 'ID_Program' => 1],
            ['Course_Name' => 'Manajemen Sumber Daya Manusia', 'Credits' => 3, 'ID_Program' => 1],

            // Akuntansi
            ['Course_Name' => 'Pengantar Akuntansi', 'Credits' => 3, 'ID_Program' => 2],
            ['Course_Name' => 'Akuntansi Biaya', 'Credits' => 3, 'ID_Program' => 2],
            ['Course_Name' => 'Auditing', 'Credits' => 3, 'ID_Program' => 2],

            // Ilmu Hukum
            ['Course_Name' => 'Hukum Pidana', 'Credits' => 3, 'ID_Program' => 3],
            ['Course_Name' => 'Hukum Perdata', 'Credits' => 3, 'ID_Program' => 3],
            ['Course_Name' => 'Hukum Internasional', 'Credits' => 3, 'ID_Program' => 3],

            // Pendidikan Dokter
            ['Course_Name' => 'Anatomi Manusia', 'Credits' => 3, 'ID_Program' => 4],
            ['Course_Name' => 'Fisiologi', 'Credits' => 3, 'ID_Program' => 4],
            ['Course_Name' => 'Farmakologi', 'Credits' => 3, 'ID_Program' => 4],

            // Teknik Sipil
            ['Course_Name' => 'Mekanika Teknik', 'Credits' => 3, 'ID_Program' => 5],
            ['Course_Name' => 'Struktur Beton', 'Credits' => 3, 'ID_Program' => 5],
            ['Course_Name' => 'Hidrologi', 'Credits' => 3, 'ID_Program' => 5],

            // Teknik Informatika
            ['Course_Name' => 'Pemrograman Dasar', 'Credits' => 3, 'ID_Program' => 6],
            ['Course_Name' => 'Basis Data', 'Credits' => 3, 'ID_Program' => 6],
            ['Course_Name' => 'Jaringan Komputer', 'Credits' => 3, 'ID_Program' => 6],

            // Teknik Arsitektur
            ['Course_Name' => 'Desain Arsitektur', 'Credits' => 3, 'ID_Program' => 7],
            ['Course_Name' => 'Bangunan Gedung', 'Credits' => 3, 'ID_Program' => 7],
            ['Course_Name' => 'Teknologi Material', 'Credits' => 3, 'ID_Program' => 7],

            // Teknik Geologi
            ['Course_Name' => 'Geologi Dasar', 'Credits' => 3, 'ID_Program' => 8],
            ['Course_Name' => 'Geologi Struktur', 'Credits' => 3, 'ID_Program' => 8],
            ['Course_Name' => 'Petrologi', 'Credits' => 3, 'ID_Program' => 8],

            // Ilmu Hubungan Internasional
            ['Course_Name' => 'Teori Hubungan Internasional', 'Credits' => 3, 'ID_Program' => 9],
            ['Course_Name' => 'Diplomasi', 'Credits' => 3, 'ID_Program' => 9],
            ['Course_Name' => 'Politik Global', 'Credits' => 3, 'ID_Program' => 9],

            // Ilmu Komunikasi
            ['Course_Name' => 'Pengantar Ilmu Komunikasi', 'Credits' => 3, 'ID_Program' => 10],
            ['Course_Name' => 'Komunikasi Antarbudaya', 'Credits' => 3, 'ID_Program' => 10],
            ['Course_Name' => 'Jurnalistik', 'Credits' => 3, 'ID_Program' => 10],

            // Pendidikan Dokter Gigi
            ['Course_Name' => 'Anatomi Gigi', 'Credits' => 3, 'ID_Program' => 11],
            ['Course_Name' => 'Konservasi Gigi', 'Credits' => 3, 'ID_Program' => 11],
            ['Course_Name' => 'Ortodonti', 'Credits' => 3, 'ID_Program' => 11],

            // S1 Kesehatan Masyarakat
            ['Course_Name' => 'Epidemiologi', 'Credits' => 3, 'ID_Program' => 12],
            ['Course_Name' => 'Biostatistik', 'Credits' => 3, 'ID_Program' => 12],
            ['Course_Name' => 'Manajemen Kesehatan', 'Credits' => 3, 'ID_Program' => 12],

            // Ilmu Keperawatan
            ['Course_Name' => 'Dasar Keperawatan', 'Credits' => 3, 'ID_Program' => 13],
            ['Course_Name' => 'Keperawatan Anak', 'Credits' => 3, 'ID_Program' => 13],
            ['Course_Name' => 'Keperawatan Komunitas', 'Credits' => 3, 'ID_Program' => 13],
        ];

        foreach ($courses as $course) {
            DB::table('courses')->insert([
                'Course_Name' => $course['Course_Name'],
                'Credits' => $course['Credits'],
                'ID_Program' => $course['ID_Program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
