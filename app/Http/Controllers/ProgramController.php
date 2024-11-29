<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = auth()->user();
        $programs = Program::all();
        if ($user->hasRole('admin') || $user->hasRole('staff')) {


            return view('dashboard.admin.programs.index', compact('programs'));
        } else {
            return view('dashboard.student.programs.index', compact('programs'));
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.programs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'program_Name' => 'required|string|max:255',
            'Country_of_Execution' => 'required|string|max:255',
            'Execution_Date' => 'required|date',
            'Participants_Count' => 'required|integer|min:1',
            'Program_Image' => 'nullable|image|max:2048',
        ]);

        $data = $validated;
        $data['ID_Program'] = 1;

        if ($request->hasFile('Program_Image')) {
            $data['Program_Image'] = $request->file('Program_Image')->store('images/program', 'public');
        }

        Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'program added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        return view('dashboard.admin.programs.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        // Validasi data dari request
        $validated = $request->validate([
            'program_Name' => 'required|string|max:255',
            'Country_of_Execution' => 'required|string|max:255',
            'Execution_Date' => 'required|date',
            'Participants_Count' => 'required|integer|min:1',
            'Program_Image' => 'nullable|image|max:2048',
        ]);

        // Update data
        $data = $validated;
        $data['ID_Program'] = 1;

        if ($request->hasFile('Program_Image')) {
            // Hapus gambar lama jika ada
            if ($program->Program_Image) {
                Storage::disk('public')->delete($program->Program_Image);
            }

            $data['Program_Image'] = $request->file('Program_Image')->store('images/program', 'public');
        }

        $program->update($data);

        return redirect()->route('admin.program.index')->with('success', 'program updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program)
    {
        // Hapus gambar jika ada
        if ($program->Program_Image && Storage::exists('public/' . $program->Program_Image)) {
            Storage::delete('public/' . $program->Program_Image);
        }

        // Hapus program dari database
        $program->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('admin.program.index')->with('success', 'Program deleted successfully.');
    }
}
