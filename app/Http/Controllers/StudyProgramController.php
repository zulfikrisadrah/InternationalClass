<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StudyProgramController extends Controller
{
    public function index(Request $request)
    {
        $studyPrograms = StudyProgram::paginate(10);
        $data = [
            'title' => 'Manage Study Program',
        ];
        $search = $request->input('search');

        // Query the StudyProgram model
        $studyPrograms = StudyProgram::query()
            ->when($search, function ($query, $search) {
                // Add a condition to filter study programs by name
                $query->where('study_program_Name', 'like', "%{$search}%");
            })
            ->paginate(10);
        return view('dashboard.admin.studyPrograms.index', compact('studyPrograms', 'search', 'data'));
    }

    public function create()
    {
        $faculties = Faculty::all();

        return view('dashboard.admin.studyPrograms.create', compact('faculties'));
    }

    public function store(Request $request)
    {
        $validatedStudyProgram  = $request->validate([
            'study_program_Name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'ID_Faculty' => 'required|exists:faculties,ID_Faculty',
            'study_program_Description' => 'required|string',
            'classrooms' => 'nullable|integer|min:0',
            'lecturers' => 'nullable|integer|min:0',
            'national_accreditation' => 'nullable|string|max:255',
            'international_accreditation' => 'nullable|string|max:255',
            'approval_sk' => 'nullable|string|max:255',
            'opening_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'director_name' => 'nullable|string|max:255',
            'director_contact' => 'nullable|string|max:255',
            'ukt_fee' => 'nullable|numeric|min:0',
            'ipi_fee' => 'nullable|numeric|min:0',
            'international_exposure' => 'nullable|string|max:255',
            'study_program_Image' => 'required|image|max:2048',
            'total_courses' => 'nullable|integer|min:0',
            'rps_courses_in_english' => 'nullable|integer|min:0',
            'teaching_materials_in_english' => 'nullable|integer|min:0',
            'courses_delivered_in_english' => 'nullable|integer|min:0',
            'courses_fully_filled_in_sikola' => 'nullable|integer|min:0',
        ]);

        $existingProgram = StudyProgram::where('study_program_Name', $request->study_program_Name)->first();
        if ($existingProgram) {
            return redirect()->back()->withErrors(['study_program_Name' => 'The study program already exists.'])->withInput();
        }

        $filePath = public_path('study_programs.csv');
        $validPrograms = [];
    
        if (file_exists($filePath)) {
            $file = fopen($filePath, 'r');
            while (($row = fgetcsv($file, 1000, ';')) !== false) {
                $validPrograms[] = $row[2];  
            }
            fclose($file);
        }
    
        if (!in_array($request->study_program_Name, $validPrograms)) {
            return redirect()->back()->withErrors(['study_program_Name' => 'The study program name is invalid.'])->withInput();
        }
    
        if ($request->hasFile('study_program_Image')) {
            $imagePath = $request->file('study_program_Image')->store('images/studyprogram', 'public');
            $validatedStudyProgram['study_program_Image'] = $imagePath;
        }
    
        StudyProgram::create($validatedStudyProgram);
    
        return redirect()->route('admin.studyProgram.index')->with('success', 'Study Program created successfully');
    }    

    public function show(StudyProgram $studyProgram)
    {
        return view('dashboard.admin.studyPrograms.show', compact('studyProgram'));
    }

    public function edit(StudyProgram $studyProgram)
    {
        $faculties = Faculty::all();

        return view('dashboard.admin.studyPrograms.edit', compact('studyProgram', 'faculties'));
    }


    public function update(Request $request, StudyProgram $studyProgram)
    {
        $validatedData = $request->validate([
            'study_program_Name' => 'required|string|max:255',
            'degree' => 'required|string|max:255',
            'ID_Faculty' => 'required|exists:faculties,ID_Faculty',
            'study_program_Description' => 'required|string',
            'classrooms' => 'nullable|integer|min:0',
            'lecturers' => 'nullable|integer|min:0',
            'national_accreditation' => 'nullable|string|max:255',
            'international_accreditation' => 'nullable|string|max:255',
            'approval_sk' => 'nullable|string|max:255',
            'opening_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'director_name' => 'nullable|string|max:255',
            'director_contact' => 'nullable|string|max:255',
            'ukt_fee' => 'nullable|numeric|min:0',
            'ipi_fee' => 'nullable|numeric|min:0',
            'international_exposure' => 'nullable|string|max:255',
            'study_program_Image' => 'nullable|image|max:2048',
            'total_courses' => 'nullable|integer|min:0',
            'rps_courses_in_english' => 'nullable|integer|min:0',
            'teaching_materials_in_english' => 'nullable|integer|min:0',
            'courses_delivered_in_english' => 'nullable|integer|min:0',
            'courses_fully_filled_in_sikola' => 'nullable|integer|min:0',
        ]);
    
        $filePath = public_path('study_programs.csv');
        $validPrograms = [];
    
        if (file_exists($filePath)) {
            $file = fopen($filePath, 'r');
            while (($row = fgetcsv($file, 1000, ';')) !== false) {
                $validPrograms[] = $row[2]; 
            }
            fclose($file);
        }
    
        if (!in_array($request->study_program_Name, $validPrograms)) {
            return redirect()->back()->withErrors(['study_program_Name' => 'The study program name is invalid.'])->withInput();
        }
    
        if ($request->hasFile('study_program_Image')) {
            if ($studyProgram->study_program_Image) {
                Storage::disk('public')->delete($studyProgram->study_program_Image);
            }
            $validatedData['study_program_Image'] = $request->file('study_program_Image')->store('images/studyprogram', 'public');
        }
    
        $studyProgram->update($validatedData);
    
        return redirect()->route('admin.studyProgram.index')->with('success', 'Study Program updated successfully');
    }
    
    public function autocomplete(Request $request)
    {
        $query = $request->get('query');  
        $filePath = public_path('study_programs.csv');  
        
        $programs = [];
        if (file_exists($filePath)) {
            $file = fopen($filePath, 'r');
            
            while (($row = fgetcsv($file, 1000, ';')) !== false) {
                $programs[] = [
                    'prodiId' => $row[0],
                    'prodiKode' => $row[1],
                    'prodiNama' => $row[2],
                    'prodiNamaAsing' => $row[3],
                    'prodiJenjang' => $row[4],
                    'prodiKodeDikti' => $row[5],
                    'prodiFakId' => $row[6]
                ];
            }
            fclose($file);
            
            $matchingPrograms = array_filter($programs, function ($program) use ($query) {
                return stripos($program['prodiNama'], $query) !== false && stripos($program['prodiNama'], 'S1') !== false;
            });
            
            return response()->json(array_values($matchingPrograms));  
        } else {
            return response()->json([]);
        }
    }

    public function destroy($id)
    {
        $studyProgram = StudyProgram::findOrFail($id);

        if ($studyProgram->study_program_Image) {
            $imagePath = public_path('storage/' . $studyProgram->study_program_Image);
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $studyProgram->delete();

        return redirect()->route('admin.studyProgram.index')->with('success', 'Study Program deleted successfully');
    }
}
