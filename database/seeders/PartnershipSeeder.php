<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Partnership;

class PartnershipSeeder extends Seeder
{
    /**
     * Seed the database with partnership data.
     *
     * @return void
     */
    public function run()
    {
        Partnership::insert([
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Agreement on Academic Cooperation Between Tokushima University Faculty of Dentistry and Hasanuddin University Faculty of Dentistry, Indonesia',
                'validity_period' => '2028',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'MoU between College Of Dentistry China Medical University and Faculty of Dentistry HU',
                'validity_period' => '2024',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'MoU Lincoln University College Malaysia and Faculty of Dentistry Hasanuddin University',
                'validity_period' => '2024',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'MoU for Academic Cooperation Between University of Malaya and Faculty of Dentistry HU',
                'validity_period' => '2024',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Agreement on Academic Cooperation Between Dental School Okayama University and HU',
                'validity_period' => '2026',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'MoU Faculty of Dentistry Bayero University Kano, Nigeria and Faculty of Dentistry HU',
                'validity_period' => '2027',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => '02011/UN4.13|HK.07/2024',
                'title_of_cooperation' => 'Implementing Arrangement Between Universiti Kebangsaan Malaysia with Faculty of Dentistry HU',
                'validity_period' => '2025',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => '01567/UN4.13/HK.07/2024',
                'title_of_cooperation' => 'IA Between Bachelor Degree Doctor of Dental Medicine Faculty of Dentistry HU and Niigata Univ on Student Exchange Program',
                'validity_period' => '2025',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => '02011/UN4.13|HK.07/2024',
                'title_of_cooperation' => 'IA between UKM and Faculty of Dentistry Hasanuddin University',
                'validity_period' => '2025',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => '02513//UN4.13/HK.07/2023',
                'title_of_cooperation' => 'IA between College of Oral Medicine, TMU and Bachelor Degree Doctor of DDM Faculty of Dentistry Hasanuddin University on Sit In/ Mobility Program for The International Class',
                'validity_period' => '2024',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => '02514/UN4.13/HK.07/2023',
                'title_of_cooperation' => 'IA between Okayama University and Bachelor Degree of DDM Faculty of Dentistry Hasanuddin University on Sit In/ Mobiliity Program for The International Class',
                'validity_period' => '2024',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'IA betweeh Faculty of Dentistry Hasanuddin University and School of Dentistry Health Sciences University of Hokkaido',
                'validity_period' => '2028',
                'ID_study_program' => 2,
            ],
            [
                'mou_moa_ia_number' => 'Letter of Intent',
                'title_of_cooperation' => 'Letter of Intent dengan Fakultas of Medicine and Health Sciences Univ. Putra Malaysia',
                'validity_period' => null,
                'ID_study_program' => 3,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Double Degree-Faculty Recognition of Prior Learning (RPL) Agreement',
                'validity_period' => '2022',
                'ID_study_program' => 12,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Double Degree-CRL BETWEEN CURTIN UNIVERSITY (\"Curtin\") AND UNIVERSITAS HASANUDDIN (\"UNHAS\")',
                'validity_period' => '2023',
                'ID_study_program' => 12,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Academic and Research Agreement',
                'validity_period' => '2028',
                'ID_study_program' => 12,
            ],
            [
                'mou_moa_ia_number' => null,
                'title_of_cooperation' => 'Double Degree/Study Abroad Program',
                'validity_period' => '2023',
                'ID_study_program' => 12,
            ],
        ]);
    }
}
