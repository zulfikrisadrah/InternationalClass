<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $user = Auth::user();
    $data = [
        'title' => 'Manage News',
    ];

    // Ambil query pencarian
    $search = $request->input('search');

    if ($user) {
        if ($user->hasRole('staff')) {
            // Berita milik staff yang sedang login
            $news = News::where('user_id', $user->id)
                ->when($search, function ($query, $search) {
                    $query->where('News_Title', 'like', '%' . $search . '%');
                })
                ->paginate(10);
        } else {
            // Semua berita untuk admin
            $news = News::when($search, function ($query, $search) {
                    $query->where('News_Title', 'like', '%' . $search . '%');
                })
                ->latest()
                ->paginate(10);
        }

        // Pastikan query pagination tetap membawa input pencarian
        return view('dashboard.admin.news.index', compact('news', 'data'));
    }
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.news.create', compact('studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;

        if (auth()->user()->hasRole('admin')) {

            $validated = $request->validate([
                'News_Title' => 'required|string|max:255',
                'News_Content' => 'required|string',
                'Publication_Date' => today(),
                'News_Image' => 'required|image|max:2048',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);

            $data = $validated;
            $data['user_id'] = $user;

        } else {

            $studyProgram = auth()->user()->staff->ID_study_program;

            $validated = $request->validate([
                'News_Title' => 'required|string|max:255',
                'News_Content' => 'required|string',
                'Publication_Date' => today(),
                'News_Image' => 'required|image|max:2048',
            ]);

            $data = $validated;
            $data['user_id'] = $user;
            $data['ID_study_program'] = $studyProgram;
        }

        if ($request->hasFile('News_Image')) {
            $data['News_Image'] = $request->file('News_Image')->store('images/news', 'public');
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.news.edit', compact('news', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        if (auth()->user()->hasRole('admin')) {

            $validated = $request->validate([
                'News_Title' => 'required|string|max:255',
                'News_Content' => 'required|string',
                'Publication_Date' => today(),
                'News_Image' => 'nullable|image|max:2048',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);

        } else {

            $validated = $request->validate([
                'News_Title' => 'required|string|max:255',
                'News_Content' => 'required|string',
                'Publication_Date' => today(),
                'News_Image' => 'nullable|image|max:2048',
            ]);

        }

        $data = $validated;

        if ($request->hasFile('News_Image')) {
            // Hapus gambar lama jika ada
            if ($news->News_Image) {
                Storage::disk('public')->delete($news->News_Image);
            }

            $data['News_Image'] = $request->file('News_Image')->store('images/news', 'public');
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        if ($news->News_Image && Storage::exists('public/' . $news->News_Image)) {
            Storage::delete('public/' . $news->News_Image);
        }

        // Hapus program dari database
        $news->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }
}
