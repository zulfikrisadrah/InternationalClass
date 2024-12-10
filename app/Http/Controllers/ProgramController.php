<?php

namespace App\Http\Controllers;

use App\Models\IeProgram;
use App\Models\Program;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = auth()->user();
        $programs = Program::query();  // Ubah dari all() ke query() untuk menambahkan kondisi pencarian
        $data = [
            'title' => 'Manage Program',
        ];

        // Menangani pencarian
        $search = $request->input('search');
        if ($search) {
            // Jika ada input pencarian, filter berdasarkan nama atau deskripsi program
            $programs = $programs->where('program_Name', 'like', '%' . $search . '%');
        }

        if ($user->hasRole('admin') || $user->hasRole('staff')) {
            if ($user->hasRole('staff')) {
                // Ambil ID study program dari staff yang sedang login
                $studyProgramId = $user->staff->ID_study_program;

                // Ambil program yang sesuai dengan study program staff
                $programs = $programs->where('ID_study_program', $studyProgramId);
            }
            // Fetch enrollments for admin/staff
            $enrollments = Program::with('students')->get();
            $programs = $programs->paginate(5);  // Ambil data program setelah difilter
            return view('dashboard.admin.programs.index', compact('programs', 'enrollments', 'data'));
        } else {
            $studyProgramId = $user->student->ID_study_program;
            $ieProgramId = $request->input('ie_program_id');
            $programs = Program::with('ieProgram')
                ->when($ieProgramId, function ($query) use ($ieProgramId) {
                    return $query->where('ID_Ie_program', $ieProgramId);
                })
                ->where('ID_study_program', $studyProgramId)
                ->paginate(5);

            $iePrograms = IeProgram::all();
            return view('dashboard.student.programs.index', compact('programs', 'iePrograms'));
        }
    }





    public function enroll(Request $request, $programId)
    {
        // Ambil program yang diinginkan
        $program = Program::findOrFail($programId);
        $student = auth()->user()->student; // Mendapatkan data student yang sedang login

        // Cek jika student sudah mendaftar ke program
        if ($student->programs()->where('program_enrollment.ID_program', $programId)->exists()) {
            return redirect()->route('student.program.index')->with('error', 'You are already enrolled.');
        }

        // Cek jumlah peserta yang sudah terdaftar di program
        $currentParticipants = $program->students()->wherePivot('status', 'approved')->count();

        // Cek jika sudah mencapai batas peserta
        if ($currentParticipants >= $program->Participants_Count) {
            return redirect()->route('student.program.index')->with('error', 'This program has reached its participant limit.');
        }

        // Daftarkan student ke program dengan status pending
        $student->programs()->attach($programId, ['status' => 'pending']);

        return redirect()->route('student.program.index')->with('success', 'Your enrollment is pending approval.');
    }




    // Untuk admin/staff memperbarui status pendaftaran
    public function updateStatus(Request $request, $programId, $studentId)
    {
        $status = $request->input('status');

        if (!in_array($status, ['approved', 'rejected'])) {
            return redirect()->route('admin.program.index')->with('error', 'Invalid status.');
        }

        $program = Program::findOrFail($programId);

        // Pastikan student yang diubah ada dalam daftar
        $student = $program->students()->where('program_enrollment.ID_Student', $studentId)->first();

        if ($student) {
            // Update status student
            if ($status === 'approved') {
                $program->students()->updateExistingPivot($student->ID_Student, ['status' => 'approved']);
            } elseif ($status === 'rejected') {
                $program->students()->detach($student->ID_Student);
            }

            // Hitung jumlah peserta yang diterima
            $approvedCount = $program->students()->wherePivot('status', 'approved')->count();

            // Hapus semua peserta pending jika batas tercapai
            if ($approvedCount >= $program->Participants_Count) {
                $program->students()->wherePivot('status', 'pending')->detach();
            }

            return redirect()->route('admin.program.index')->with('success', 'Enrollment status updated.');
        }

        return redirect()->route('admin.program.index')->with('error', 'Enrollment not found.');
    }




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $iePrograms = IeProgram::all();
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.programs.create', compact('iePrograms', 'studyPrograms'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = auth()->user()->id;

        if (auth()->user()->hasRole('admin')) {

            $validated = $request->validate([
                'program_Name' => 'required|string|max:255',
                'program_description' => 'required|string',
                'Country_of_Execution' => 'required|string|max:255',
                'Execution_Date' => 'required|date',
                'Participants_Count' => 'required|integer|min:1',
                'program_Image' => 'nullable|image|max:2048',
                'ID_Ie_program' => 'required|exists:ie_programs,ID_Ie_program',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);

            $data = $validated;
            $data['user_id'] = $user;

        } else {

            $studyProgram = auth()->user()->staff->ID_study_program;

            $validated = $request->validate([
                'program_Name' => 'required|string|max:255',
                'program_description' => 'required|string',
                'Country_of_Execution' => 'required|string|max:255',
                'Execution_Date' => 'required|date',
                'Participants_Count' => 'required|integer|min:1',
                'program_Image' => 'nullable|image|max:2048',
                'ID_Ie_program' => 'required|exists:ie_programs,ID_Ie_program',
            ]);

            // Tambahkan data tambahan di luar validasi
            $data = $validated;
            $data['user_id'] = $user;
            $data['ID_study_program'] = $studyProgram;
        }

        // Handle file upload jika ada
        if ($request->hasFile('program_Image')) {
            // Validasi file upload
            if (!$request->file('program_Image')->isValid()) {
                return redirect()->back()->withErrors(['program_Image' => 'Uploaded file is invalid.']);
            }
            $data['program_Image'] = $request->file('program_Image')->store('images/program', 'public');
        }

        // Buat program baru
        Program::create($data);

        return redirect()->route('admin.program.index')->with('success', 'Program added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Program $program)
    {
        $acceptedStudents = $program->students()
        ->wherePivot('status', 'approved')
        ->paginate(10);

        return view('dashboard.admin.programs.show', compact('program', 'acceptedStudents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program)
    {
        $iePrograms = IeProgram::all();
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.programs.edit', compact('program', 'iePrograms', 'studyPrograms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program)
    {
        // Validasi data dari request
        if (auth()->user()->hasRole('admin')) {
            $validated = $request->validate([
                'program_Name' => 'required|string|max:255',
                'program_description' => 'required|string',
                'Country_of_Execution' => 'required|string|max:255',
                'Execution_Date' => 'required|date',
                'Participants_Count' => 'required|integer|min:1',
                'program_Image' => 'nullable|image|max:2048',
                'ID_Ie_program' => 'required|exists:ie_programs,ID_Ie_program',
                'ID_study_program' => 'required|exists:study_programs,ID_study_program',
            ]);
        } else {
            $validated = $request->validate([
                'program_Name' => 'required|string|max:255',
                'program_description' => 'required|string',
                'Country_of_Execution' => 'required|string|max:255',
                'Execution_Date' => 'required|date',
                'Participants_Count' => 'required|integer|min:1',
                'program_Image' => 'nullable|image|max:2048',
                'ID_Ie_program' => 'required|exists:ie_programs,ID_Ie_program',
            ]);
        }

        // Update data
        $data = $validated;

        if ($request->hasFile('program_Image')) {
            // Hapus gambar lama jika ada
            if ($program->program_Image) {
                Storage::disk('public')->delete($program->program_Image);
            }

            $data['program_Image'] = $request->file('program_Image')->store('images/program', 'public');
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
