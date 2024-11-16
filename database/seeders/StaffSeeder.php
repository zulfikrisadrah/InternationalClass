<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('staff')->insert([
            'Staff_Name' => 'Iqbal Ramadhan',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
