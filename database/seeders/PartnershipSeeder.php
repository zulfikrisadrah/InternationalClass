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
        Partnership::create([
            'mou_moa_ia_number' => 'MOU12345',
            'title_of_cooperation' => 'Cooperation on Joint Research',
            'validity_period' => '2024',
            'ID_study_program' => 1, 
        ]);

        Partnership::create([
            'mou_moa_ia_number' => 'MOA67890',
            'title_of_cooperation' => 'Academic Exchange Program',
            'validity_period' => '2025',
            'ID_study_program' => 2, 
        ]);

        Partnership::create([
            'mou_moa_ia_number' => 'IA54321',
            'title_of_cooperation' => 'Internship Collaboration',
            'validity_period' => '2026',
            'ID_study_program' => 3, 
        ]);
    }
}
