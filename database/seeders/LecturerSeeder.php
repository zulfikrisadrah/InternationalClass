<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LecturerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $lecturers = [
            [
                'Lecturer_Name' => 'Prof. Dr. Ir. Mardiana E. Fachry, MS.',
                'NIP' => '195907071985032002',
                'Lecturer_Email' => 'mardiana.fachry@unhas.ac.id',
                'ID_Program' => 1, // Manajemen
            ],
            [
                'Lecturer_Name' => 'Prof. Dr. Siti Aminah, M.Sc.',
                'NIP' => '196012141990032001',
                'Lecturer_Email' => 'siti.aminah@unhas.ac.id',
                'ID_Program' => 2, // Akuntansi
            ],
            [
                'Lecturer_Name' => 'Dr. Rahmat Hidayat, S.H., M.H.',
                'NIP' => '197001121995021003',
                'Lecturer_Email' => 'rahmat.hidayat@unhas.ac.id',
                'ID_Program' => 3, // Ilmu Hukum
            ],
            [
                'Lecturer_Name' => 'Prof. Dr. Wulan Pertiwi, Sp.KK.',
                'NIP' => '196807091992032004',
                'Lecturer_Email' => 'wulan.pertiwi@unhas.ac.id',
                'ID_Program' => 4, // Pendidikan Dokter
            ],
            [
                'Lecturer_Name' => 'Ir. Aditya Kusuma, M.T.',
                'NIP' => '197504151997021002',
                'Lecturer_Email' => 'aditya.kusuma@unhas.ac.id',
                'ID_Program' => 5, // Teknik Sipil
            ],
            [
                'Lecturer_Name' => 'Dr. Andi Rizki, S.Kom., M.T.',
                'NIP' => '198106201998032003',
                'Lecturer_Email' => 'andi.rizki@unhas.ac.id',
                'ID_Program' => 6, // Teknik Informatika
            ],
            [
                'Lecturer_Name' => 'Ir. Dian Pramesti, Ph.D.',
                'NIP' => '197907241996022005',
                'Lecturer_Email' => 'dian.pramesti@unhas.ac.id',
                'ID_Program' => 7, // Teknik Arsitektur
            ],
            [
                'Lecturer_Name' => 'Dr. Dwi Santika, Ir., M.T.',
                'NIP' => '198212031999031001',
                'Lecturer_Email' => 'dwi.santika@unhas.ac.id',
                'ID_Program' => 8, // Teknik Geologi
            ],
            [
                'Lecturer_Name' => 'Dr. Rizal Fahmi, S.IP., M.A.',
                'NIP' => '197607121995031006',
                'Lecturer_Email' => 'rizal.fahmi@unhas.ac.id',
                'ID_Program' => 9, // Ilmu Hubungan Internasional
            ],
            [
                'Lecturer_Name' => 'Prof. Dr. Fira Anjani, S.I.Kom.',
                'NIP' => '198305101999032002',
                'Lecturer_Email' => 'fira.anjani@unhas.ac.id',
                'ID_Program' => 10, // Ilmu Komunikasi
            ],
            [
                'Lecturer_Name' => 'Dr. Wendi Hartono, Sp.Ort.',
                'NIP' => '197511021996022003',
                'Lecturer_Email' => 'wendi.hartono@unhas.ac.id',
                'ID_Program' => 11, // Pendidikan Dokter Gigi
            ],
            [
                'Lecturer_Name' => 'Dr. Eka Wardana, S.KM., M.P.H.',
                'NIP' => '196904151994032004',
                'Lecturer_Email' => 'eka.wardana@unhas.ac.id',
                'ID_Program' => 12, // S1 Kesehatan Masyarakat
            ],
            [
                'Lecturer_Name' => 'Dr. Lisa Kartika, S.Kep., Ns., M.Kep.',
                'NIP' => '197810101998021005',
                'Lecturer_Email' => 'lisa.kartika@unhas.ac.id',
                'ID_Program' => 13, // Ilmu Keperawatan
            ],
        ];

        foreach ($lecturers as $lecturer) {
            DB::table('lecturers')->insert([
                'Lecturer_Name' => $lecturer['Lecturer_Name'],
                'NIP' => $lecturer['NIP'],
                'Lecturer_Email' => $lecturer['Lecturer_Email'],
                'ID_Program' => $lecturer['ID_Program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
