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
            [
                'study_program_Name' => 'TEKNIK ARSITEKTUR - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/arsitektur.png',
                'study_program_Description' =>
                    'The Architecture program focuses on the design, planning, and construction of buildings and other physical structures. 
                Students will gain a deep understanding of architectural theory, history, and technology, 
                preparing them for a career in creating sustainable and innovative designs in the built environment. 
                They will learn to integrate functionality, aesthetics, and environmental considerations to develop architectural solutions.'
            ],
            [
                'study_program_Name' => 'TEKNIK GEOLOGI - S1',
                'ID_Faculty' => 4,
                'study_program_Image' => 'images/studyprogram/geo.png',
                'study_program_Description' =>
                    'The Geology program trains students to study the Earth’s physical structure and processes. 
                It covers a wide range of topics including mineralogy, petrology, sedimentology, and geophysics, 
                providing graduates with the knowledge to explore and manage natural resources and understand environmental challenges. 
                Students will also learn about the Earth’s history and the processes that shape its landscapes, 
                with a focus on sustainable practices and environmental preservation.'
            ],
            [
                'study_program_Name' => 'ILMU HUKUM - S1',
                'ID_Faculty' => 2,
                'study_program_Image' => 'images/studyprogram/FH-UNHAS-10.png',
                'study_program_Description' =>
                    'The Law program provides students with a comprehensive understanding of legal principles, frameworks, and practices. 
                It prepares students to work in a wide range of legal careers including litigation, corporate law, public policy, and more. 
                The curriculum emphasizes the importance of ethical reasoning, critical thinking, and international law, 
                while also covering various branches such as civil law, criminal law, and constitutional law. 
                Graduates will be equipped to advocate for justice, protect human rights, and contribute to legal reforms.'
            ],
            [
                'study_program_Name' => 'ILMU HUBUNGAN INTERNASIONAL - S1',
                'ID_Faculty' => 5,
                'study_program_Image' => 'images/studyprogram/hi.png',
                'study_program_Description' =>
                    'The International Relations program focuses on understanding the political, economic, and cultural interactions between nations. 
                Students will explore topics such as diplomacy, international organizations, human rights, and conflict resolution, 
                preparing them for careers in government, NGOs, or international businesses. 
                The program also emphasizes the importance of global cooperation, the challenges of international security, and the role of international law in addressing global issues.'
            ],
            [
                'study_program_Name' => 'ILMU KOMUNIKASI - S1',
                'ID_Faculty' => 5,
                'study_program_Image' => 'images/studyprogram/ilkom.png',
                'study_program_Description' =>
                    'The Communication Studies program covers a wide range of topics in communication theory, media studies, journalism, and public relations. 
                Students will develop skills in writing, speaking, and media production, equipping them for careers in various sectors such as media, advertising, 
                corporate communication, and public relations. 
                The program also includes the study of digital media, the role of communication in society, and the impact of technology on the communication process.'
            ],
            [
                'study_program_Name' => 'MANAJEMEN - S1',
                'ID_Faculty' => 1,
                'study_program_Image' => 'images/studyprogram/Fakultas-Ekonomi-dan-Bisnis.png',
                'study_program_Description' =>
                    'The Management program equips students with the knowledge and skills to lead and manage organizations effectively. 
                It covers areas such as organizational behavior, strategy, human resource management, and finance, 
                preparing students for leadership roles in diverse industries. 
                The program also emphasizes the development of critical thinking, decision-making, and problem-solving skills, 
                enabling graduates to navigate the complexities of the modern business environment.'
            ],
            [
                'study_program_Name' => 'AKUTANSI - S1',
                'ID_Faculty' => 1,
                'study_program_Image' => 'images/studyprogram/Fakultas-Ekonomi-dan-Bisnis.png',
                'study_program_Description' =>
                    'The Accounting program provides students with a thorough understanding of financial and managerial accounting principles. 
                Students will learn about financial reporting, auditing, taxation, and accounting systems, 
                preparing them for careers in accounting, finance, and business analysis. 
                The program also covers ethical issues in accounting, as well as the use of accounting information for business decision-making, 
                ensuring that graduates are equipped to contribute effectively in the financial sector.'
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
