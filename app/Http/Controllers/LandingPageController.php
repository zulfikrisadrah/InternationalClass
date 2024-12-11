<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\Event;
use App\Models\IeProgram;
use App\Models\Program;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;


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

        // Mengambil berita yang relevan dengan program studi
        $news = News::where('ID_study_program', $ID_study_program)
            ->latest()
            ->take(3)
            ->get();

        $events = Event::where('ID_study_program', $ID_study_program)
            ->latest()
            ->take(2)
            ->get();

        return view('studyProgram.show', compact('programs', 'data', 'data_config', 'prospects', 'news', 'events'));
    }

    // Untuk di halaman /news
    public function news()
    {
        $news_page = News::latest()->paginate(4);
        $popular_news_page = Cache::remember('news_popular', now()->addMinutes(10), function () {
            return News::orderBy('views', 'desc')->limit(4)->get();
        });
        $data = [
            'title' => 'News',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('news.index', compact('news_page', 'popular_news_page', 'data'));
    }
    public function newsShow($ID_News)
    {
        $newsItem = News::findOrFail($ID_News);
        $newsItem->increment('views');
        Cache::forget('news_popular');

        $data = [
            'title' => 'News',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('news.show', compact('newsItem', 'data'));
    }
    // Untuk di halaman /events
    public function event()
    {
        $events_page = Event::latest()->paginate(4);
        $upcoming_events_page = Event::where('Event_Date', '>=', now())
            ->latest()
            ->take(4)
            ->get();
        $data = [
            'title' => 'Event',
            'description' => 'Discover upcoming activities and programs from Hasanuddin University International Class.
            From academic workshops to cultural exchanges, these events are designed to enhance learning experiences,
            foster global connections, and celebrate our diverse community.',
        ];
        return view('event.index', compact('events_page', 'upcoming_events_page', 'data'));
    }
    public function eventShow($ID_Event)
    {
        $eventItem = Event::findOrFail($ID_Event);
        $data = [
            'title' => 'Event',
            'description' => 'Explore the latest updates from Hasanuddin University International Class,
            featuring student achievements, international collaborations, and important developments that
            showcase our dedication to global academic excellence.',
        ];

        return view('event.show', compact('eventItem', 'data'));
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
    public function InternationalExposure()
    {
        $programs = Program::latest()->paginate(5);
        $data = [
            'title' => 'International Exposure',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];
        return view('InternationalExposure.index', compact('data', 'programs'));
    }
    public function InternationalExposureShow($ID_program)
    {
        $programItem = Program::findOrFail($ID_program);
        $data = [
            'title' => 'International Exposure',
            'description' => 'Join our International Class to experience a world-class education, expert instructors, and a diverse community. Gain valuable skills, global insights, and hands-on learning opportunities that will prepare you for a bright future in an interconnected world.',
        ];

        return view('InternationalExposure.show', compact('data', 'programItem'));
    }
}
