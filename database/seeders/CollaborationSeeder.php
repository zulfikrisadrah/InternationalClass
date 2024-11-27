<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CollaborationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collaborations = [
            [
                'MoU_MoA_IA_Number' => '02011/UN4.13|HK.07/2024',
                'Collaboration_Title' => 'IA between UKM and Faculty of Dentistry Hasanuddin University',
                'Validity_Period' => '2025-12-31',
                'ID_Program' => 11, // ID program untuk 'Pendidikan Dokter Gigi'
            ],
            [
                'MoU_MoA_IA_Number' => '03022/UN4.10|HK.02/2023',
                'Collaboration_Title' => 'MoU with Faculty of Economics and Business',
                'Validity_Period' => '2024-12-31',
                'ID_Program' => 1, // ID program untuk 'Manajemen'
            ],
            [
                'MoU_MoA_IA_Number' => '05033/UN4.15|HK.09/2023',
                'Collaboration_Title' => 'IA between Faculty of Engineering and PT. Teknologi Nusantara',
                'Validity_Period' => '2026-06-30',
                'ID_Program' => 6, // ID program untuk 'Teknik Informatika'
            ],
        ];

        foreach ($collaborations as $collaboration) {
            DB::table('collaborations')->insert([
                'MoU_MoA_IA_Number' => $collaboration['MoU_MoA_IA_Number'],
                'Collaboration_Title' => $collaboration['Collaboration_Title'],
                'Validity_Period' => $collaboration['Validity_Period'],
                'ID_Program' => $collaboration['ID_Program'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
