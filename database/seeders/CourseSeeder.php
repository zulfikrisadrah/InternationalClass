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
            // Management
            ['Course_Name' => 'Introduction to Management', 'Credits' => 3, 'ID_Program' => 1],
            ['Course_Name' => 'Financial Management', 'Credits' => 3, 'ID_Program' => 1],
            ['Course_Name' => 'Human Resource Management', 'Credits' => 3, 'ID_Program' => 1],

            // Accounting
            ['Course_Name' => 'Introduction to Accounting', 'Credits' => 3, 'ID_Program' => 2],
            ['Course_Name' => 'Cost Accounting', 'Credits' => 3, 'ID_Program' => 2],
            ['Course_Name' => 'Auditing', 'Credits' => 3, 'ID_Program' => 2],

            // Law
            ['Course_Name' => 'Criminal Law', 'Credits' => 3, 'ID_Program' => 3],
            ['Course_Name' => 'Civil Law', 'Credits' => 3, 'ID_Program' => 3],
            ['Course_Name' => 'International Law', 'Credits' => 3, 'ID_Program' => 3],

            // Medicine
            ['Course_Name' => 'Human Anatomy', 'Credits' => 3, 'ID_Program' => 4],
            ['Course_Name' => 'Physiology', 'Credits' => 3, 'ID_Program' => 4],
            ['Course_Name' => 'Pharmacology', 'Credits' => 3, 'ID_Program' => 4],

            // Civil Engineering
            ['Course_Name' => 'Engineering Mechanics', 'Credits' => 3, 'ID_Program' => 5],
            ['Course_Name' => 'Concrete Structures', 'Credits' => 3, 'ID_Program' => 5],
            ['Course_Name' => 'Hydrology', 'Credits' => 3, 'ID_Program' => 5],

            // Computer Science
            ['Course_Name' => 'Introduction to Programming', 'Credits' => 3, 'ID_Program' => 6],
            ['Course_Name' => 'Database Systems', 'Credits' => 3, 'ID_Program' => 6],
            ['Course_Name' => 'Computer Networks', 'Credits' => 3, 'ID_Program' => 6],

            // Architecture
            ['Course_Name' => 'Architectural Design', 'Credits' => 3, 'ID_Program' => 7],
            ['Course_Name' => 'Building Structures', 'Credits' => 3, 'ID_Program' => 7],
            ['Course_Name' => 'Material Technology', 'Credits' => 3, 'ID_Program' => 7],

            // Geology
            ['Course_Name' => 'Basic Geology', 'Credits' => 3, 'ID_Program' => 8],
            ['Course_Name' => 'Structural Geology', 'Credits' => 3, 'ID_Program' => 8],
            ['Course_Name' => 'Petrology', 'Credits' => 3, 'ID_Program' => 8],

            // International Relations
            ['Course_Name' => 'International Relations Theory', 'Credits' => 3, 'ID_Program' => 9],
            ['Course_Name' => 'Diplomacy', 'Credits' => 3, 'ID_Program' => 9],
            ['Course_Name' => 'Global Politics', 'Credits' => 3, 'ID_Program' => 9],

            // Communication Studies
            ['Course_Name' => 'Introduction to Communication Studies', 'Credits' => 3, 'ID_Program' => 10],
            ['Course_Name' => 'Intercultural Communication', 'Credits' => 3, 'ID_Program' => 10],
            ['Course_Name' => 'Journalism', 'Credits' => 3, 'ID_Program' => 10],

            // Dentistry
            ['Course_Name' => 'Dental Anatomy', 'Credits' => 3, 'ID_Program' => 11],
            ['Course_Name' => 'Dental Conservation', 'Credits' => 3, 'ID_Program' => 11],
            ['Course_Name' => 'Orthodontics', 'Credits' => 3, 'ID_Program' => 11],

            // Public Health
            ['Course_Name' => 'Epidemiology', 'Credits' => 3, 'ID_Program' => 12],
            ['Course_Name' => 'Biostatistics', 'Credits' => 3, 'ID_Program' => 12],
            ['Course_Name' => 'Health Management', 'Credits' => 3, 'ID_Program' => 12],

            // Nursing
            ['Course_Name' => 'Nursing Fundamentals', 'Credits' => 3, 'ID_Program' => 13],
            ['Course_Name' => 'Pediatric Nursing', 'Credits' => 3, 'ID_Program' => 13],
            ['Course_Name' => 'Community Nursing', 'Credits' => 3, 'ID_Program' => 13],
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
