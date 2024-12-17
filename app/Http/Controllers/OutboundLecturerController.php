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
        ]);

        $outboundLecturer = new OutboundLecturer($validatedData);
        $outboundLecturer->studyProgram()->associate($studyProgram);
        $outboundLecturer->save();

        return redirect()->back()->with('success', 'Outbound Lecturer added successfully');
    }
}