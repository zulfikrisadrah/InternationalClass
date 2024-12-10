<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyProgram;
use App\Models\News;
use App\Models\Event;
use App\Models\IeProgram;


class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil berbagai data yang dibutuhkan
        $programs = StudyProgram::with('faculty')->get();
        $news = News::latest()->take(3)->get(); // Mengambil 3 berita terbaru
        $events = Event::latest()->take(2)->get();
        $ie_programs = IeProgram::pluck('ie_program_name');

        $data = [
            'international_exposure_programs' => $ie_programs,
            'title' => 'International Class',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];

        return view('home', compact('programs', 'news', 'events', 'data'));
    }

    public function studyProgram()
    {
        $programs = StudyProgram::with('faculty')->get();
        $ie_programs = IeProgram::pluck('ie_program_name');
        $data = [
            'title' => 'Study Program',
            'description' => 'The International Class is a program conducted in English or another foreign language, 
            designed to equip graduates with the skills and language proficiency to compete globally. Students will 
            engage in international exposure activities, such as joint degrees, double degrees, internships, or other 
            opportunities at partner universities or institutions abroad.',
            'international_exposure_programs' => $ie_programs,
        ];

        return view('studyProgram.index', compact('programs', 'data'));
    }
    public function studyProgramShow($ID_study_program)
    {
        $programs = StudyProgram::with('faculty')->findOrFail($ID_study_program);
        $ie_programs = IeProgram::pluck('ie_program_name');
        $data = [
            'title' => $programs->study_program_Name,
            'description' => $programs->study_program_Description,
        ];
        // Mengambil data program studi dari konfigurasi
        $data_config = config("studyprogram.$ID_study_program", [
            'description' => 'Deskripsi tidak tersedia',
            'whychoose' => 'Alasan tidak tersedia',
            'prospects' => [],
        ]);

        // Menyiapkan data untuk dikirim ke view
        $program = $data_config;  // Program studi yang ditemukan
        $prospects = $data_config['prospects']; // Prospek yang relevan

        return view('studyProgram.show', compact('programs', 'data','data_config', 'prospects'));
    }

    // Untuk di halaman /news
    public function news()
    {
        $news_page = News::latest()->paginate(4); // Tampil per page 4
        $popular_news_page = News::latest()->take(4)->get(); // Ambil 4 berita terbaru
        $data = [
            'title' => 'News',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('news', compact('news_page', 'popular_news_page', 'data'));
    }
    // Untuk di halaman /events
    public function event()
    {
        $events_page = Event::latest()->paginate(4); // Tampil per page 4
        $big_events_page = Event::latest()->take(4)->get(); // Sementara pakai latest event
        $upcoming_events_page = Event::latest()->take(4)->get(); // Sementara pakai latest event
        $data = [
            'title' => 'Event',
            'description' => 'Discover upcoming activities and programs from Hasanuddin University International Class.
            From academic workshops to cultural exchanges, these events are designed to enhance learning experiences,
            foster global connections, and celebrate our diverse community.',
        ];
        return view('event', compact('events_page', 'big_events_page', 'upcoming_events_page', 'data'));
    }
    public function about()
    {
        $data = [
            'title' => 'About',
            'description' => 'The International Class at Hasanuddin University is a prestigious program
            established in 2006 to provide world-class education. It aims to produce globally competitive
            graduates through innovative learning, international collaborations, and a focus on the unique
            potential of the Indonesian Maritime Continent.',
        ];
        return view('about', compact('data'));
    }
}
