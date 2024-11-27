<?php

namespace App\Http\Controllers;

use App\Models\IeActivity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class IeActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $activities = IeActivity::all();
        return view('dashboard.admin.programs.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ie_activities.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data dari request
        $validated = $request->validate([
            'Activity_Name' => 'required|string|max:255',
            'Country_of_Execution' => 'required|string|max:255',
            'Execution_Date' => 'required|date',
            'Participants_Count' => 'required|integer|min:1',
            'IeActivity_Image' => 'nullable|image|max:2048',
        ]);

        // Simpan data ke database
        $data = $validated;

        // Jika ada gambar, simpan dan tambahkan path ke data
        if ($request->hasFile('IeActivity_Image')) {
            $data['IeActivity_Image'] = $request->file('IeActivity_Image')->store('images/ie_activities', 'public');
        }

        IeActivity::create($data);

        return redirect()->route('ie_activities.index')->with('success', 'Activity added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(IeActivity $ieActivity)
    {
        return view('ie_activities.show', compact('ieActivity'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IeActivity $ieActivity)
    {
        return view('ie_activities.edit', compact('ieActivity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IeActivity $ieActivity)
    {
        // Validasi data dari request
        $validated = $request->validate([
            'Activity_Name' => 'required|string|max:255',
            'Country_of_Execution' => 'required|string|max:255',
            'Execution_Date' => 'required|date',
            'Participants_Count' => 'required|integer|min:1',
            'IeActivity_Image' => 'nullable|image|max:2048',
        ]);

        // Update data
        $data = $validated;

        // Jika ada gambar baru, simpan dan tambahkan path ke data
        if ($request->hasFile('IeActivity_Image')) {
            // Hapus gambar lama jika ada
            if ($ieActivity->IeActivity_Image) {
                Storage::disk('public')->delete($ieActivity->IeActivity_Image);
            }

            $data['IeActivity_Image'] = $request->file('IeActivity_Image')->store('images/ie_activities', 'public');
        }

        $ieActivity->update($data);

        return redirect()->route('ie_activities.index')->with('success', 'Activity updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IeActivity $ieActivity)
    {
        // Hapus gambar jika ada
        if ($ieActivity->IeActivity_Image) {
            Storage::disk('public')->delete($ieActivity->IeActivity_Image);
        }

        // Hapus data dari database
        $ieActivity->delete();

        return redirect()->route('ie_activities.index')->with('success', 'Activity deleted successfully.');
    }
}
