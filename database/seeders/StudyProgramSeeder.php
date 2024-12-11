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
                    "The Medical Education program provides comprehensive training with a curriculum to develop 
                    professional medical practitioners. Students gain knowledge, skills, and attitudes through 
                    theoretical studies and clinical training.",
            ],
            [
                'study_program_Name' => 'PENDIDIKAN DOKTER GIGI - S1',
                'ID_Faculty' => 10,
                'study_program_Image' => 'images/studyprogram/doktergigi.png',
                'study_program_Description' =>
                    "The Dentistry Education program develops skilled professionals to diagnose, treat, and 
                    prevent oral diseases. The curriculum combines academic excellence with clinical practice 
                    for high-quality oral healthcare.",
            ],
            [
                'study_program_Name' => 'ILMU KEPERAWATAN - S1',
                'ID_Faculty' => 15,
                'study_program_Image' => 'images/studyprogram/keperawatan.png',
                'study_program_Description' =>
                    "The Nursing Science program trains compassionate, competent nurses to provide care for 
                    individuals, families, and communities. It emphasizes health sciences, nursing ethics, 
                    and practical experiences in healthcare settings.",
            ],
            [
                'study_program_Name' => 'KESEHATAN MASYARAKAT - S1',
                'ID_Faculty' => 11,
                'study_program_Image' => 'images/studyprogram/kesmas.png',
                'study_program_Description' =>
                    "The Public Health program educates future leaders to tackle global health challenges. 
                    The curriculum covers epidemiology, health promotion, environmental health, and policy, 
                    equipping students to improve population health.",
            ],
            [
                'study_program_Name' => 'TEKNIK SIPIL - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/sipil.png',
                'study_program_Description' =>
                    "The Civil Engineering program offers robust training in designing, constructing, and maintaining 
                    infrastructure. Students study structural analysis, geotechnical engineering, and sustainable 
                    practices, preparing for urban development projects.",
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
            [
                'study_program_Name' => 'TEKNIK ARSITEKTUR - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/arsitektur.png',
                'study_program_Description' =>
                    'The Architecture program focuses on designing and constructing buildings and structures. 
                    Students explore architectural theory, history, and technology, preparing for careers in 
                    sustainable designs that integrate functionality, aesthetics, and environmental considerations.'
            ],
            [
                'study_program_Name' => 'TEKNIK GEOLOGI - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/geo.png',
                'study_program_Description' =>
                    'The Geology program trains students to study Earth’s structure and processes. 
                    It covers mineralogy, petrology, sedimentology, and geophysics, preparing graduates to explore 
                    resources and address environmental challenges with a focus on sustainability.'
            ],
            [
                'study_program_Name' => 'ILMU HUKUM - S1',
                'ID_Faculty' => 2,
                'study_program_Image' => 'images/studyprogram/FH-UNHAS-10.png',
                'study_program_Description' =>
                    '"The Law program provides an understanding of legal principles and practices. It prepares students 
                    for careers in litigation, corporate law, public policy, and more. The curriculum emphasizes ethical 
                    reasoning, critical thinking, and international law, covering civil, criminal, and constitutional law.'
            ],
            [
                'study_program_Name' => 'ILMU HUBUNGAN INTERNASIONAL - S1',
                'ID_Faculty' => 5,
                'study_program_Image' => 'images/studyprogram/hi.png',
                'study_program_Description' =>
                    'The International Relations program covers political, economic, and cultural interactions between 
                    nations, focusing on diplomacy, human rights, and conflict resolution, preparing students for careers 
                    in government, NGOs, or international business.'
            ],
            [
                'study_program_Name' => 'ILMU KOMUNIKASI - S1',
                'ID_Faculty' => 5,
                'study_program_Image' => 'images/studyprogram/ilkom.png',
                'study_program_Description' =>
                    'The Communication Studies program covers communication theory, media studies, journalism, and public 
                    relations. Students develop skills in writing, speaking, and media production for careers in media, 
                    advertising, corporate communication, and public relations.'
            ],
            [
                'study_program_Name' => 'MANAJEMEN - S1',
                'ID_Faculty' => 1,
                'study_program_Image' => 'images/studyprogram/Fakultas-Ekonomi-dan-Bisnis.png',
                'study_program_Description' =>
                    'The Management program equips students with skills to lead and manage organizations. It covers 
                    organizational behavior, strategy, HR management, and finance, preparing students for leadership 
                    roles in various industries.'
            ],
            [
                'study_program_Name' => 'AKUTANSI - S1',
                'ID_Faculty' => 1,
                'study_program_Image' => 'images/studyprogram/Fakultas-Ekonomi-dan-Bisnis.png',
                'study_program_Description' =>
                    'The Accounting program teaches financial and managerial accounting principles, including reporting, 
                    auditing, taxation, and systems. It prepares students for careers in accounting, finance, and business 
                    analysis, emphasizing ethics and decision-making.'
            ],
            [
                'study_program_Name' => 'SISTEM INFORMASI - S1',
                'ID_Faculty' => 8,
                'study_program_Image' => 'images/studyprogram/Fakultas-Ekonomi-dan-Bisnis.png',
                'study_program_Description' =>
                    '(PRODI TESTING) The Accounting program provides students with a thorough understanding of financial and managerial accounting principles. 
                Students will learn about financial reporting, auditing, taxation, and accounting systems, 
                preparing them for careers in accounting, finance, and business analysis. 
                The program also covers ethical issues in accounting, as well as the use of accounting information for business decision-making, 
                ensuring that graduates are equipped to contribute effectively in the financial sector.'
            ],
        ];


        foreach ($programs as $program) {
            $faculty = DB::table('faculties')->where('ID_Faculty', $program['ID_Faculty'])->first();

            if ($faculty) {
                DB::table('study_programs')->insert([
                    'study_program_Name' => $program['study_program_Name'],
                    'study_program_Image' => $program['study_program_Image'],
                    'degree' => 'Undergraduate',
                    'study_program_Description' => $program['study_program_Description'],
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
