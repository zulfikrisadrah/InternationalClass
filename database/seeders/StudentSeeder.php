<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            'Student_Name' => 'Zulfikri Shadroch',
            'Student_ID_Number' => 'H071221082',
            'Student_Email' => 'zufasa@unhas.ac.id',
            'Country_of_Origin' => 'Indonesia',
            'user_id' => 3,
            'ID_Program' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
