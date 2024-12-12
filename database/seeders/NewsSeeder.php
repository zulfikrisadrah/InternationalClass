<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\File;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Storage::disk('public')->makeDirectory('images/news');

        $news = [
            [
                'News_Title' => 'Global Education Trends: The Future of Learning',
                'News_Content' => 'With advancements in technology and evolving societal needs, the global education landscape is shifting. Here’s how international education systems are adapting to the changing world.',
                'user_id' => 1,
                'ID_study_program' => 1,
                'Publication_Date' => '2024-01-01',
                'News_Image' => public_path('images\studyprogram\Fakultas-Ekonomi-dan-Bisnis.png'),
            ],
            [
                'News_Title' => 'International Collaboration in Higher Education',
                'News_Content' => 'Leading universities around the world are forming collaborations to offer joint programs, research opportunities, and student exchange initiatives, fostering a global learning environment.',
                'user_id' => 1,
                'ID_study_program' => 2,
                'Publication_Date' => '2024-01-02',
                'News_Image' => public_path('images\studyprogram\FH-UNHAS-10.png'),
            ],
            [
                'News_Title' => 'Cultural Diversity in University Campuses: Embracing Global Perspectives',
                'News_Content' => 'Cultural diversity plays a crucial role in enhancing the student experience. International students bring unique perspectives, enriching the academic environment for all.',
                'user_id' => 1,
                'ID_study_program' => 3,
                'Publication_Date' => '2024-01-03',
                'News_Image' => public_path('images\studyprogram\FK-unhas.png'),
            ],
            [
                'News_Title' => 'The Rise of Global Online Education Platforms',
                'News_Content' => 'Online education is no longer confined to a specific region. Global platforms are offering access to top-tier courses and degrees to students across continents.',
                'user_id' => 1,
                'ID_study_program' => 4,
                'Publication_Date' => '2024-01-04',
                'News_Image' => public_path('images\studyprogram\sipil.png'),
            ],
            [
                'News_Title' => 'Preparing International Students for Success in a Globalized World',
                'News_Content' => 'As more students pursue education abroad, universities are focusing on providing support systems to ensure their success both academically and socially in a diverse and interconnected world.',
                'user_id' => 1,
                'ID_study_program' => 5,
                'Publication_Date' => '2024-01-05',
                'News_Image' => public_path('images\studyprogram\hi.png'),
            ]
        ];

        foreach ($news as $item) {
            $imagePath = Storage::disk('public')->putFile('images/news', new File($item['News_Image']));

            DB::table('news')->insert([
                'News_Title' => $item['News_Title'],
                'News_Content' => $item['News_Content'],
                'News_Image' => $imagePath,
                'user_id' => $item['user_id'],
                'ID_study_program' => $item['ID_study_program'],
                'Publication_Date' => $item['Publication_Date'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
