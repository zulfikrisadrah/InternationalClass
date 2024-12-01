<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\StudyProgram;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = $request->input('role');
        $status = $request->input('status');
        
        // Menghitung jumlah user yang berada di waiting list
        $waitingCount = User::role('student')
                            ->whereDoesntHave('student')  
                            ->whereNotIn('username', Student::pluck('Student_ID_Number'))  
                            ->count();
        
        if ($role == 'student') {
            $users = User::role('student')
                         ->whereHas('student', function ($query) {
                             // Pastikan status isActive ada di tabel student
                             $query->where('isActive', 1);
                         })
                         ->get();
    
            foreach ($users as $user) {
                $student = $user->student;  
    
                if ($student && $student->isActive == 1 && !$user->hasPermissionTo('choose program')) {
                    $user->givePermissionTo('choose program');
                }
            }
        } elseif ($status == 'waiting') {
            $users = User::role('student')
                         ->whereDoesntHave('student') 
                         ->whereNotIn('username', Student::pluck('Student_ID_Number')) 
                         ->get();
        } else {
            $users = User::when($role, function ($query, $role) {
                            return $query->role($role);
                        })
                        ->where('username', '!=', 'admin') 
                        ->get();
        }
    
        return view('dashboard.admin.users.index', compact('users', 'waitingCount'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.admin.users.create'); // Tampilkan form create user
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
            'name' => 'required|string|max:255', // Tambahkan validasi untuk name
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
        $action = $request->input('action');
        
        if (in_array($action, ['accept', 'reject'])) {
            $accessToken = session('access_token');
            
            if (!$accessToken) {
                abort(500, 'Access token tidak ditemukan dalam session.');
            }
    
            $response = Http::withOptions(['verify' => false])
                ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                ->withBody(json_encode([
                    'nim' => $user->username
                ]), 'application/json')
                ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');
    
            if (!$response->successful()) {
                abort(500, 'Failed to fetch program data from API.');
            }
    
            $data = $response->json();
            if (!isset($data['mahasiswas'][0]['prodi']['nama_resmi'])) {
                abort(500, 'Invalid response structure from API.');
            }
    
            $programName = $data['mahasiswas'][0]['prodi']['nama_resmi'];
    
            $studyProgram = StudyProgram::where('study_program_Name', $programName)
                ->first(); 
    
            if (!$studyProgram) {
                return response()->json(['error' => 'Program studi not found.'], 404);
            }
    
            $studyProgramId = $studyProgram->ID_study_program;
    
            Student::create([
                'Student_Name' => $user->name,
                'Student_ID_Number' => $user->username,
                'Student_Email' => $user->email,
                'isActive' => $action === 'accept' ? 1 : 0,
                'user_id' => $user->id,
                'ID_study_program' => $studyProgramId,
            ]);
    
            if ($action === 'accept') {
                $user->givePermissionTo('choose program');
            } else {
                $user->revokePermissionTo('choose program');
            }
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
}
