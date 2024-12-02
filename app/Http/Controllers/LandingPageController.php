<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyProgram;
use App\Models\News;
use App\Models\Event;


class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil berbagai data yang dibutuhkan
        $programs = StudyProgram::with('faculty')->get();
        $news = News::latest()->take(3)->get(); // Mengambil 3 berita terbaru
        $events = Event::latest()->take(2)->get();
        
        return view('home', compact('programs', 'news', 'events'));

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
