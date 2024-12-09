<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudyProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'study_program_Name' => 'PENDIDIKAN DOKTER - S1',
                'ID_Faculty' => 3,
                'study_program_Image' => 'images/studyprogram/FK-unhas.png',
                'study_program_Description' =>
                    "The Medical Education program offers comprehensive training in medicine with a curriculum 
                    designed to develop competent and professional medical practitioners. Students are equipped 
                    with the knowledge, skills, and attitudes necessary to address healthcare challenges. 
                    The program includes rigorous theoretical studies combined with hands-on clinical training 
                    in hospitals and healthcare facilities.",
            ],
            [
                'study_program_Name' => 'PENDIDIKAN DOKTER GIGI - S1',
                'ID_Faculty' => 10,
                'study_program_Image' => 'images/studyprogram/doktergigi.png',
                'study_program_Description' =>
                    "The Dentistry Education program focuses on developing students into skilled dental professionals 
                    who can diagnose, treat, and prevent oral and dental diseases. The curriculum combines academic 
                    excellence with clinical practice to ensure students are well-prepared to provide high-quality 
                    oral healthcare services.",
            ],
            [
                'study_program_Name' => 'ILMU KEPERAWATAN - S1',
                'ID_Faculty' => 15,
                'study_program_Image' => 'images/studyprogram/keperawatan.png',
                'study_program_Description' =>
                    "The Nursing Science program is dedicated to training compassionate and competent nurses who can 
                    provide comprehensive care to individuals, families, and communities. The program emphasizes 
                    a strong foundation in health sciences, nursing ethics, and practical experiences in various 
                    healthcare settings.",
            ],
            [
                'study_program_Name' => 'KESEHATAN MASYARAKAT - S1',
                'ID_Faculty' => 11,
                'study_program_Image' => 'images/studyprogram/kesmas.png',
                'study_program_Description' =>
                    "The Public Health program aims to educate future public health leaders who can tackle global 
                    health challenges. The curriculum covers a wide range of topics, including epidemiology, health 
                    promotion, environmental health, and health policy. Students will develop the skills needed 
                    to improve population health through innovative solutions.",
            ],
            [
                'study_program_Name' => 'TEKNIK SIPIL - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/sipil.png',
                'study_program_Description' =>
                    "The Civil Engineering program provides a robust education in designing, constructing, and 
                    maintaining infrastructure. Students will learn about structural analysis, geotechnical 
                    engineering, and sustainable construction practices, preparing them to contribute to urban 
                    development and infrastructure projects.",
            ],
            [
                'study_program_Name' => 'TEKNIK INFORMATIKA - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/infor.png',
                'study_program_Description' =>
                    "The Informatics Engineering program is designed to prepare students for careers in the ever-evolving 
                    field of information technology. With a strong focus on software development, artificial intelligence, 
                    and cybersecurity, the program equips graduates with the technical expertise and problem-solving 
                    skills needed to excel in the tech industry.",
            ],
        ];


        foreach ($programs as $program) {
            $faculty = DB::table('faculties')->where('ID_Faculty', $program['ID_Faculty'])->first();

            if ($faculty) {
                DB::table('study_programs')->insert([
                    'study_program_Name' => $program['study_program_Name'],
                    'study_program_Image' => $program['study_program_Image'],
                    'degree' => 'Undergraduate',
                    'study_program_Description' => null,
                    'International_Accreditation' => null,
                    'ID_Faculty' => $faculty->ID_Faculty,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else {
                echo "Fakultas '{$program['faculty_name']}' tidak ditemukan.\n";
            }
        }
    }
}
