<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DegreeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $degrees = [
            ['Degree' => 'SE'],     
            ['Degree' => 'S.H.'],
            ['Degree' => 'S.Ked'],
            ['Degree' => 'Ir'],
            ['Degree' => 'B.Eng'],
            ['Degree' => 'S.I.H.I'],
            ['Degree' => 'S.I.Kom.'],
            ['Degree' => 'S.KG'],
            ['Degree' => 'S.KM'],
            ['Degree' => 'S.Kep'],
        ];

        foreach ($degrees as $degree) {
            DB::table('degrees')->insert([
                'Degree' => $degree['Degree'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
