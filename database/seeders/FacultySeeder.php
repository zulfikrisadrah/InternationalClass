<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacultySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculties = [
            ['Faculty_Name' => 'Faculty of Economics and Business', 'Faculty_Code' => 'FEB'],
            ['Faculty_Name' => 'Faculty of Law', 'Faculty_Code' => 'FH'],
            ['Faculty_Name' => 'Faculty of Medicine', 'Faculty_Code' => 'FK'],
            ['Faculty_Name' => 'Faculty of Engineering', 'Faculty_Code' => 'FT'],
            ['Faculty_Name' => 'Faculty of Social and Political Sciences', 'Faculty_Code' => 'FISIP'],
            ['Faculty_Name' => 'Faculty of Dentistry', 'Faculty_Code' => 'FKG'],
            ['Faculty_Name' => 'Faculty of Public Health', 'Faculty_Code' => 'FKM'],
            ['Faculty_Name' => 'Faculty of Nursing', 'Faculty_Code' => 'FKEP']
        ];

        foreach ($faculties as $faculty) {
            DB::table('faculties')->insert([
                'Faculty_Name' => $faculty['Faculty_Name'],
                'Faculty_Code' => $faculty['Faculty_Code'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
