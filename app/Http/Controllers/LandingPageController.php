<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudyProgram;
use App\Models\News;


class LandingPageController extends Controller
{
    public function index()
    {
        // Mengambil berbagai data yang dibutuhkan untuk landing page
        $programs = StudyProgram::with('faculty')->get();
        $news = News::latest()->take(3)->get(); // Mengambil 3 berita terbaru

        // Mengirim semua data ke view
        return view('home', compact('programs', 'news',));
    }


}
