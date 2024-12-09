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
        $programs = StudyProgram::where('isFilled', 1)->get();        
        $news = News::latest()->take(3)->get(); // Mengambil 3 berita terbaru
        $events = Event::latest()->take(2)->get();
        $ie_programs = IeProgram::pluck('ie_program_name');

        $data = [
            'international_exposure_programs' => $ie_programs,
        ];

        return view('home', compact('programs', 'news', 'events', 'data'));

    }

    public function studyProgram()
    {
        $programs = StudyProgram::where('isFilled', 1)->get();        
        $ie_programs = IeProgram::pluck('ie_program_name');
        $data = [
            'description' => 'The International Class is a program held separately from the regular classes, using 
            English or another foreign language as the medium of instruction. This program is specifically designed to 
            equip graduates with knowledge, skills, and foreign language proficiency, enabling them to compete in the global 
            free market. Each student will participate in an international exposure activity at a partner university 
            or institution abroad, such as joint degrees, double degrees, sit-ins, internships, or other forms of 
            experience to gain international learning exposure.',
            'international_exposure_programs' => $ie_programs,
        ];

        return view('studyProgram', compact('programs', 'data'));
    }

    // Untuk di halaman /news
    public function news()
    {
        $news_page = News::latest()->paginate(4); // Tampil per page 4 
        $popular_news_page = News::latest()->take(4)->get(); // Ambil 4 berita terbaru

        return view('news', compact('news_page', 'popular_news_page'));
    }
    // Untuk di halaman /events
    public function event()
    {
        $events_page = Event::latest()->paginate(4); // Tampil per page 4 
        $big_events_page = Event::latest()->take(4)->get(); // Sementara pakai latest event
        $upcoming_events_page = Event::latest()->take(4)->get(); // Sementara pakai latest event

        return view('event', compact('events_page', 'big_events_page', 'upcoming_events_page'));
    }
}
