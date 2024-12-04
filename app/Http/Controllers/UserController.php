<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Staff;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();
        $role = $request->input('role');
        $status = $request->input('status');
        $data = [
            'title' => 'Manage User',
        ];

        if (Auth::user()->hasRole('admin')) {
            $waitingCount = User::role('student')
                ->whereDoesntHave('student')
                ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                ->count();
        } elseif (Auth::user()->hasRole('staff')) {
            $adminCount = $waitingCount = User::role('student')
                ->whereDoesntHave('student')
                ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                ->count();

            if ($adminCount > 0) {
            }
            $adminStudyProgram = Auth::user()->staff->studyProgram->study_program_Name;
            $users = User::role('student')
                ->whereDoesntHave('student')
                ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                ->get();

            $waitingCount = 0;

            foreach ($users as $user) {
                $tokenData = $this->loginAndGetToken();
                if ($tokenData['status'] == 200) {
                    $accessToken = $tokenData['access_token'];

                    $response = Http::withOptions(['verify' => false])
                        ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                        ->withBody(json_encode(['nim' => $user->username]), 'application/json')
                        ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');

                    if ($response->successful()) {
                        $data = $response->json();
                        if (isset($data['mahasiswas'][0]['prodi']['nama_resmi'])) {
                            $studentStudyProgram = $data['mahasiswas'][0]['prodi']['nama_resmi'];

                            if ($studentStudyProgram === $adminStudyProgram) {
                                $waitingCount++;
                            }
                        }
                    }
                }
            }
        }

        $users = collect();
        $programNames = [];

        if ($role == 'student') {
            if (Auth::user()->hasRole('admin')) {
                $users = User::role('student')
                    ->whereHas('student', function ($query) {
                        $query->where('isActive', 1);
                    })->get();
            } else if (Auth::user()->hasRole('staff')) {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                $users = User::role('student')
                    ->whereHas('student', function ($query) use ($staffStudyProgram) {
                        $query->where('isActive', 1)
                            ->where('ID_study_program', $staffStudyProgram);
                    })->get();
            }
        } elseif ($role == 'staff') {
            $users = User::role('staff')->get();
        } elseif ($status == 'waiting') {
            if (Auth::user()->hasRole('staff')) {
                $staffStudyProgram = auth()->user()->staff->studyProgram->study_program_Name;

                $users = User::role('student')
                    ->whereDoesntHave('student')
                    ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                    ->get();

                $validUsers = [];
                foreach ($users as $user) {
                    $tokenData = $this->loginAndGetToken();
                    if ($tokenData['status'] == 200) {
                        $accessToken = $tokenData['access_token'];

                        $response = Http::withOptions(['verify' => false])
                            ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                            ->withBody(json_encode(['nim' => $user->username]), 'application/json')
                            ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');

                        if ($response->successful()) {
                            $data = $response->json();
                            if (isset($data['mahasiswas'][0]['prodi']['nama_resmi'])) {
                                $studentStudyProgram = $data['mahasiswas'][0]['prodi']['nama_resmi'];
                                $programNames[$user->id] = $data['mahasiswas'][0]['prodi']['nama_resmi'];

                                if ($studentStudyProgram == $staffStudyProgram) {
                                    $validUsers[] = $user;
                                }
                            }
                        }
                    }
                }
                $users = collect($validUsers);
            } else {
                if (Auth::user()->hasRole('admin')) {
                    $users = User::role('student')
                        ->whereDoesntHave('student')
                        ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                        ->get();
                } else if (Auth::user()->hasRole('staff')) {
                    $staffStudyProgram = auth()->user()->staff->ID_study_program;

                    $users = User::role('student')
                        ->whereDoesntHave('student')
                        ->whereNotIn('username', Student::pluck('Student_ID_Number'))
                        ->whereHas('student', function ($query) use ($staffStudyProgram) {
                            $query->where('ID_study_program', $staffStudyProgram);
                        })
                        ->get();
                }

                foreach ($users as $user) {
                    $tokenData = $this->loginAndGetToken();
                    if ($tokenData['status'] == 200) {
                        $accessToken = $tokenData['access_token'];

                        $response = Http::withOptions(['verify' => false])
                            ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                            ->withBody(json_encode(['nim' => $user->username]), 'application/json')
                            ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');

                        if ($response->successful()) {
                            $data = $response->json();
                            if (isset($data['mahasiswas'][0]['prodi']['nama_resmi'])) {
                                $programNames[$user->id] = $data['mahasiswas'][0]['prodi']['nama_resmi'];
                            }
                        }
                    }
                }
            }
        } else {
            if (Auth::user()->hasRole('admin')) {
                $users = User::when($role, function ($query, $role) {
                    return $query->role($role);
                })
                    ->where('username', '!=', 'admin')
                    ->where(function ($query) {
                        $query->whereHas('student');
                    })
                    ->get();
            } else {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                $users = User::role('student')
                    ->whereHas('student', function ($query) use ($staffStudyProgram) {
                        $query->whereIn('isActive', [1, 0])
                            ->where('ID_study_program', $staffStudyProgram);
                    })
                    ->get();
            }
        }

        return view('dashboard.admin.users.index', compact('users', 'waitingCount', 'programNames', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $studyPrograms = StudyProgram::all();
        return view('dashboard.admin.users.create', compact('studyPrograms'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'username' => 'required|string|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
            'name' => 'required|string|max:255',
            'ID_study_program' => 'nullable|integer',
        ]);

        // Cek apakah email sudah ada di database
        $emailExists = User::where('email', $request->email)->exists();
        $usernameExists = User::where('username', $request->username)->exists(); // Cek apakah username sudah ada

        if ($emailExists || $usernameExists) {
            return back()->withErrors([
                'email' => 'The email or username is already taken.',
            ]);
        }

        // Persiapkan data untuk membuat user baru
        $data = $validated;
        $data['password'] = Hash::make($request->password); // Hash password

        // Buat user baru dengan role 'staff'
        $user = User::create($data);

        // Menetapkan role 'staff' pada user yang baru dibuat
        $user->assignRole('staff');

        Staff::create([
            'Staff_Name' => $validated['name'],
            'user_id' => $user->id,
            'ID_study_program' => $validated['ID_study_program'],
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('admin.user.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.admin.users.edit', compact('user')); // Tampilkan form edit user
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        if ($user->student && isset($user->student->isActive)) {
            $isActive = $request->input('isActive') ? 1 : 0;

            $user->student->isActive = $isActive;
            $user->student->save();
        }

        $action = $request->input('action');

        if (in_array($action, ['accept', 'reject'])) {
            $tokenData = $this->loginAndGetToken();

            if ($tokenData['status'] == 200) {
                $accessToken = $tokenData['access_token'];

                $response = Http::withOptions(['verify' => false])
                    ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                    ->withBody(json_encode(['nim' => $user->username]), 'application/json')
                    ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');
            }
            if (!$response->successful()) {
                abort(500, 'Failed to fetch program data from API.');
            }

            $data = $response->json();
            if (!isset($data['mahasiswas'][0]['prodi']['nama_resmi'])) {
                abort(500, 'Invalid response structure from API.');
            }

            $programName = $data['mahasiswas'][0]['prodi']['nama_resmi'];

            $studyProgram = StudyProgram::where('study_program_Name', $programName)->first();

            if (!$studyProgram) {
                return response()->json(['error' => 'Program studi not found.'], 404);
            }

            $studyProgramId = $studyProgram->ID_study_program;

            if (Auth::user()->hasRole('staff')) {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                if ($staffStudyProgram != $studyProgramId) {
                    return redirect()->route('admin.user.index')->with('error', 'Anda tidak memiliki akses untuk mahasiswa di program studi ini.');
                }
            }

            Student::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'Student_Name' => $user->name,
                    'Student_ID_Number' => $user->username,
                    'Student_Email' => $user->email,
                    'isActive' => $action === 'accept' ? 1 : 0,
                    'ID_study_program' => $studyProgramId,
                ]
            );

            if ($action === 'accept') {
                $user->givePermissionTo('choose program');
            } else {
                $user->revokePermissionTo('choose program');
            }

            return redirect()->route('admin.user.index')->with('success', 'Action performed successfully.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($user->student) {
            $user->student->update([
                'Student_Name' => $validated['name'],
                'Student_Email' => $validated['email'],
                'isActive' => $request->has('isActive') ? 1 : 0,
            ]);

            if ($request->has('isActive')) {
                $user->givePermissionTo('choose program');
            } else {
                $user->revokePermissionTo('choose program');
            }
        }

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);
        }

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if ($user->student) {
            $user->student->delete();
        }

        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }

    private function loginAndGetToken()
    {
        try {
            $loginResponse = Http::withOptions(['verify' => false])
                ->post('https://sipakamase.unhas.ac.id:8107/login', [
                    'username' => 'admin',
                    'password' => 'UnhasTamalanreaMakassar',
                ]);

            if ($loginResponse->successful()) {
                $loginData = $loginResponse->json();

                if (isset($loginData['access_token'])) {
                    return [
                        'status' => $loginResponse->status(),
                        'access_token' => $loginData['access_token'],
                        'message' => 'Login berhasil',
                    ];
                } else {
                    return [
                        'status' => $loginResponse->status(),
                        'message' => 'Access token tidak ditemukan dalam respons API.',
                    ];
                }
            } else {
                return [
                    'status' => $loginResponse->status(),
                    'message' => 'Login gagal. Status: ' . $loginResponse->status() . ' - ' . $loginResponse->body(),
                ];
            }
        } catch (\Exception $e) {
            return [
                'status' => 500,
                'message' => 'Terjadi kesalahan saat menghubungi API: ' . $e->getMessage(),
            ];
        }
    }
}
