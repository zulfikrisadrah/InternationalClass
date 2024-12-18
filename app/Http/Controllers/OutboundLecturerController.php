<?php

namespace App\Http\Controllers;

use App\Models\OutboundLecturer;
use App\Models\StudyProgram;
use Illuminate\Http\Request;

class OutboundLecturerController extends Controller
{
    public function store(Request $request, StudyProgram $studyProgram)
    {
        $validatedData = $request->validate([
            'lecturer_name' => 'required|string|max:255',
            'gender' => 'required|in:Male,Female',
            'role_in_ki' => 'required|string|max:255',
            'university_name' => 'required|string|max:255',
            'activity_year' => 'required|integer',
        'ID_study_program' => 'required',
    ]);

    OutboundLecturer::create($validatedData);

        return redirect()->back()->with('success', 'Outbound Lecturer added successfully');
    }
    public function update(Request $request, OutboundLecturer $outboundLecturer)
    {
        $validatedData = $request->validate([
            'lecturer_name' => 'required',
            'gender' => 'required',
            'role_in_ki' => 'required',
            'university_name' => 'required',
            'activity_year' => 'required|integer',
        ]);

        $outboundLecturer->update($validatedData);

        return redirect()->back()->with('success', 'Outbound Lecturer edit successfully');
    }

    public function destroy(OutboundLecturer $outboundLecturer)
    {
        $outboundLecturer->delete();

        return redirect()->back()->with('success', 'Outbound Lecturer delete successfully');
    }
}