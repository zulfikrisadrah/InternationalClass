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
        ]);

        $partnership = new Partnership($validatedData);
        $partnership->studyProgram()->associate($studyProgram);
        $partnership->save();

        return redirect()->back()->with('success', 'Partnership added successfully');
    }
}