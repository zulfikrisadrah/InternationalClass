<?php

namespace App\Http\Controllers;

use App\Models\Partnership;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class PartnershipController extends Controller
{
    public function store(Request $request, StudyProgram $studyProgram)
{
    $validatedData = $request->validate([
        'mou_moa_ia_number' => 'required|string|max:255',
        'title_of_cooperation' => 'required|string|max:255',
        'validity_period' => 'required|string|max:255',
        'ID_study_program' => 'required',
    ]);

    Partnership::create($validatedData);

    return redirect()->back()->with('success', 'Partnership added successfully');
}
    public function update(Request $request, Partnership $partnership)
    {
        $validatedData = $request->validate([
            'mou_moa_ia_number' => 'required',
            'title_of_cooperation' => 'required',
            'validity_period' => 'required',
        ]);

        $partnership->update($validatedData);

        return redirect()->back()->with('success', 'Partnership edit successfully');
    }

    public function destroy(Partnership $partnership)
    {
        $partnership->delete();

        return redirect()->back()->with('success', 'Partnership delete successfully');
    }
}