<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $programs = [
            [
                'Program_Name' => 'Management',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 1, // Faculty of Economics and Business
                'ID_Degree' => 1,  // Bachelor of Economics (SE)
            ],
            [
                'Program_Name' => 'Accounting',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 1, // Faculty of Economics and Business
                'ID_Degree' => 1,  // Bachelor of Economics (SE)
            ],
            [
                'Program_Name' => 'Law',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 2, // Faculty of Law
                'ID_Degree' => 2,  // Bachelor of Law (S.H.)
            ],
            [
                'Program_Name' => 'Medical Education',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 3, // Faculty of Medicine
                'ID_Degree' => 3,  // Bachelor of Medicine (S.Ked)
            ],
            [
                'Program_Name' => 'Civil Engineering',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 4, // Faculty of Engineering
                'ID_Degree' => 4,  // Engineer (Ir)
            ],
            [
                'Program_Name' => 'Informatics Engineering',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 4, // Faculty of Engineering
                'ID_Degree' => 5,  // Bachelor of Engineering (B.Eng)
            ],
            [
                'Program_Name' => 'Architecture Engineering',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 4, // Faculty of Engineering
                'ID_Degree' => 4,  // Engineer (Ir)
            ],
            [
                'Program_Name' => 'Geological Engineering',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 4, // Faculty of Engineering
                'ID_Degree' => 4,  // Engineer (Ir)
            ],
            [
                'Program_Name' => 'International Relations',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 5, // Faculty of Social and Political Sciences
                'ID_Degree' => 6,  // Bachelor of International Relations (S.I.H.I)
            ],
            [
                'Program_Name' => 'Communication Science',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 5, // Faculty of Social and Political Sciences
                'ID_Degree' => 7,  // Bachelor of Communication (S.I.Kom.)
            ],
            [
                'Program_Name' => 'Dental Education',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 6, // Faculty of Dentistry
                'ID_Degree' => 8,  // Bachelor of Dentistry (S.KG)
            ],
            [
                'Program_Name' => 'Public Health',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 7, // Faculty of Public Health
                'ID_Degree' => 9,  // Bachelor of Public Health (S.KM)
            ],
            [
                'Program_Name' => 'Nursing Science',
                'Level' => 'Undergraduate',
                'ID_Faculty' => 8, // Faculty of Nursing
                'ID_Degree' => 10, // Bachelor of Nursing (S.Kep)
            ],
        ];


        foreach ($programs as $program) {
            DB::table('programs')->insert([
                'Program_Name' => $program['Program_Name'],
                'Level' => $program['Level'],
                'Program_Description' => null,
                'Approval_Letter_SK' => null,
                'Creation_Year_SK' => null,
                'Website_Link' => null,
                'Program_Head_Name' => null,
                'Program_Head_Contact_No' => null,
                'Classroom_Count' => null,
                'KI_Teacher_Count' => null,
                'IE_Type' => null,
                'Student_UKT_Fee' => null,
                'Student_DP_IPI_Fee' => null,
                'Activity_Photo_Link' => null,
                'International_Accreditation' => false,
                'ID_Faculty' => $program['ID_Faculty'],
                'ID_Degree' => $program['ID_Degree'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
