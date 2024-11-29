<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IeProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $iePrograms = [
            [
                'ie_program_name' => 'Sit In Program',
            ],
            [
                'ie_program_name' => 'Internship Program',
            ],
            [
                'ie_program_name' => 'Short Course',
            ],
            [
                'ie_program_name' => 'Enrichment Program',
            ],
        ];

        foreach ($iePrograms as $program) {
            DB::table('ie_programs')->insert([
                'ie_program_name' => $program['ie_program_name'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
