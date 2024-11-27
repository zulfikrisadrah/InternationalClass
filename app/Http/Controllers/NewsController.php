<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $news = News::all();
        return view('dashboard.admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'News_Title' => 'required|string|max:255',
            'News_Content' => 'required|string',
            'Publication_Date' => today(),
            'News_Image' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        $data['user_id'] = 1;

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
        return view('dashboard.admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'News_Title' => 'required|string|max:255',
            'News_Content' => 'required|string',
            'Publication_Date' => today(),
            'News_Image' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        $data['user_id'] = 1;

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
