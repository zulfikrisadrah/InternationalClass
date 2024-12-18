<?php

namespace App\Http\Controllers;

use App\Models\Logbook;
use App\Models\Program;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;

class LogbookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Program $program)
    {

        $user = auth()->user();
        $data = [
            'title' => 'Manage Logbook',
        ];

            $logbooks = Logbook::where('user_id', auth()->id())
                            ->where('ID_program', $program->ID_program)
                            ->orderBy('Start_Time', 'asc')
                            ->get();

            return view('dashboard.student.logbook.index', compact('logbooks', 'program', 'data'));
    }

    public function indexForAdmin(Program $program, User $user)
    {
        $data = [
            'title' => 'Student Logbook Report'
        ];

        $logbooks = Logbook::where('ID_program', $program->ID_program)
                       ->where('user_id', $user->id)
                       ->orderBy('Start_Time', 'asc')
                       ->get();

        // Kirimkan data logbook dan student ke view
        return view('dashboard.admin.logbook.index', compact('logbooks', 'program', 'data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Program $program)
    {
        return view('dashboard.student.logbook.create', compact('program'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Program $program)
    {
        $user = auth()->user()->id;

        // Validasi input dengan batasan tanggal program
        $validated = $request->validate([
            'Logbook_Name' => 'required|string|max:50',
            'Start_Time' => [
                'required',
                'date',
                'after_or_equal:' . $program->Execution_Date,
                'before_or_equal:' . $program->End_Date,
            ],
            'End_Time' => [
                'required',
                'date',
                'after:Start_Time',
                'before_or_equal:' . $program->End_Date,
            ],
            'Logbook_Description' => 'required|string|max:50',
            'Logbook_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'Start_Time.after_or_equal' => 'Start Time must be on or after the program start date (' . $program->Execution_Date . ').',
            'Start_Time.before_or_equal' => 'Start Time must be on or before the program end date (' . $program->End_Date . ').',
            'End_Time.before_or_equal' => 'End Time must be on or before the program end date (' . $program->End_Date . ').',
            'End_Time.after' => 'End Time must be after Start Time.',
        ]);

        // Menambahkan user_id dan ID_program ke data yang akan disimpan
        $data = $validated;
        $data['user_id'] = $user;
        $data['ID_program'] = $program->ID_program;

        // Mengelola file upload jika ada
        if ($request->hasFile('Logbook_Image')) {
            $data['Logbook_Image'] = $request->file('Logbook_Image')->store('images/logbook', 'public');
        }

        // Menyimpan data ke database
        Logbook::create($data);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('student.logbook.index', $program->ID_program)
                        ->with('success', 'Logbook entry added successfully.');
    }

    public function storeCertificate(Request $request, Program $program)
    {
        $request->validate([
            'certificate' => 'required|mimes:pdf|max:5120',
        ]);

        $student = auth()->user()->student;

        if ($request->hasFile('certificate')) {
            $certificate = $request->file('certificate');
            $certificatePath = $certificate->store('certificates', 'certificate');

            // Simpan path ke kolom certificate_path
            $student->programs()->updateExistingPivot($program->ID_program, [
                'certificate_path' => $certificatePath,
            ]);
        }

        return redirect()->route('student.logbook.index', $program->ID_program)->with('success', 'Certificate uploaded successfully.');
    }

    public function readCertificate(Program $program, User $user)
    {
        // Temukan program enrollment berdasarkan program ID dan user ID
        $enrollment = DB::table('program_enrollment')
            ->where('ID_program', $program->ID_program)
            ->where('ID_Student', $user->student->ID_Student ?? null)
            ->first();

        // Cek apakah data enrollment ditemukan dan memiliki path sertifikat
        if (!$enrollment || !$enrollment->certificate_path) {
            abort(404, 'Certificate not found.');
        }

        $certificatePath = $enrollment->certificate_path;

        if (!Storage::disk('certificate')->exists($certificatePath)) {
            abort(404, 'Certificate file not found in storage.');
        }

        // Baca konten file dan kembalikan sebagai respons PDF
        $fileContents = Storage::disk('certificate')->get($certificatePath);
        return response($fileContents, 200)
            ->header('Content-Type', 'application/pdf');
    }





    /**
     * Display the specified resource.
     */
    public function show(Logbook $logbook)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Program $program, Logbook $logbook)
    {
        return view('dashboard.student.logbook.edit', compact('program', 'logbook'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Program $program, Logbook $logbook)
    {
        $validated = $request->validate([
            'Logbook_Name' => 'required|string|max:50',
            'Start_Time' => [
                'required',
                'date',
                'after_or_equal:' . $program->Execution_Date,
                'before_or_equal:' . $program->End_Date,
            ],
            'End_Time' => [
                'required',
                'date',
                'after:Start_Time',
                'before_or_equal:' . $program->End_Date,
            ],
            'Logbook_Description' => 'required|string|max:50',
            'Logbook_Image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'Start_Time.after_or_equal' => 'Start Time must be on or after the program start date (' . $program->Execution_Date . ').',
            'Start_Time.before_or_equal' => 'Start Time must be on or before the program end date (' . $program->End_Date . ').',
            'End_Time.before_or_equal' => 'End Time must be on or before the program end date (' . $program->End_Date . ').',
            'End_Time.after' => 'End Time must be after Start Time.',
        ]);

        $data = $validated;

        if ($request->hasFile('Logbook_Image')) {
            // Hapus gambar lama jika ada
            if ($logbook->Logbook_Image) {
                Storage::disk('public')->delete($logbook->Logbook_Image);
            }

            // Simpan gambar baru
            $data['Logbook_Image'] = $request->file('Logbook_Image')->store('images/logbook', 'public');
        }

        // Update logbook
        $logbook->update($data);

        return redirect()->route('student.logbook.index', $program->ID_program)
                        ->with('success', 'Logbook Entry updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Program $program, Logbook $logbook)
    {
        if ($logbook->Logbook_Image && Storage::exists('public/' . $logbook->Logbook_Image)) {
            Storage::delete('public/' . $logbook->Logbook_Image);
        }

        $logbook->delete();

        return redirect()->route('student.logbook.index', $program->ID_program)
                     ->with('success', 'Logbook entry deleted successfully.');
    }
}
