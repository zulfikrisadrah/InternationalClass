<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $events = [
            [
                'Event_Title' => 'International Business Management Workshop',
                'Event_Content' => 'An engaging workshop on global business strategies and management insights. Hosted by the Faculty of Economics and Business.',
                'user_id' => 1,
                'Publication_Date' => '2024-01-01',
            ],
            [
                'Event_Title' => 'Legal Aspects of International Trade',
                'Event_Content' => 'A seminar on understanding the complexities of international trade laws. Hosted by the Faculty of Law.',
                'user_id' => 1,
                'Publication_Date' => '2024-01-02',
            ],
            [
                'Event_Title' => 'Advancements in Medical Education',
                'Event_Content' => 'Discover the latest innovations in medical education at this conference. Hosted by the Faculty of Medicine.',
                'user_id' => 1,
                'Publication_Date' => '2024-01-03',
            ],
            [
                'Event_Title' => 'Artificial Intelligence and Future Trends',
                'Event_Content' => 'Explore the future of AI and its applications in technology. Hosted by the Faculty of Engineering.',
                'user_id' => 1,
                'Publication_Date' => '2024-01-04',
            ],
            [
                'Event_Title' => 'Global Diplomacy and International Relations',
                'Event_Content' => 'Understand the principles of diplomacy and international relations. Hosted by the Faculty of Social and Political Sciences.',
                'user_id' => 1,
                'Publication_Date' => '2024-01-05',
            ]
        ];

        foreach ($events as $event) {
            DB::table('events')->insert([
                'Event_Title' => $event['Event_Title'],
                'Event_Content' => $event['Event_Content'],
                'user_id' => $event['user_id'],
                'Publication_Date' => $event['Publication_Date'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
