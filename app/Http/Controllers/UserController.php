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
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $studyPrograms = StudyProgram::all();
        $years = Student::all()
            ->pluck('Student_ID_Number')
            ->map(function ($idNumber) {
                return '20' . substr($idNumber, 4, 2);
            })
            ->unique()
            ->sortDesc()
            ->values();

        $search = $request->input(key: 'search');

        $user = Auth::user();
        $role = $request->input('role');
        $status = $request->input('status');
        $studentStatus = $request->input('studentStatus');

        $data = [
            'title' => 'Manage User',
        ];

        if (Auth::user()->hasRole('admin')) {
            $validStudyPrograms = StudyProgram::pluck('study_program_Name')->toArray();

            $waitingCount = User::role('student')
                ->whereHas('student', function ($query) use ($validStudyPrograms) {
                    $query->where('status', 'waiting')
                          ->whereIn('ID_study_program', StudyProgram::whereIn('study_program_Name', $validStudyPrograms)->pluck('ID_study_program'));
                })
                ->count();

        } elseif (Auth::user()->hasRole('staff')) {
            $adminStudyProgram = Auth::user()->staff->studyProgram->ID_study_program;

            $waitingCount = User::role('student')
                ->whereHas('student', function ($query) use ($adminStudyProgram) {
                    $query->where('status', 'waiting')
                          ->where('ID_study_program', $adminStudyProgram);
                })
                ->count();
        }

        $users = collect();
        $programNames = [];

        if ($role == 'student') {
            if (Auth::user()->hasRole('admin')) {
                $users = User::role('student')
                ->whereHas('student', function ($query) {
                    $query->where('isActive', 1);
                })
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%');
                })
                ->when($request->filled('study_program'), function ($query) use ($request) {
                    $query->whereHas('student', function ($subQuery) use ($request) {
                        $subQuery->where('ID_study_program', $request->study_program);
                    });
                })
                ->when($request->filled('year'), function ($query) use ($request) {
                    $year = $request->year;
                    $query->whereHas('student', function ($subQuery) use ($year) {
                        $subQuery->whereRaw("SUBSTRING(Student_ID_Number, 5, 2) = ?", [substr($year, -2)]);
                    });
                })
                ->when($request->filled('studentStatus'), function ($query) use ($request) {
                    $studentStatus = $request->input('studentStatus');
                
                    if ($studentStatus == 'completed') {
                        $query->whereHas('student.programs', function ($subQuery) {
                            $subQuery->where('program_enrollment.status', 'approved')
                                     ->where('program_enrollment.isFinished', 1);
                        });
                    } elseif ($studentStatus == 'in_progress') {
                        $query->whereHas('student.programs', function ($subQuery) {
                            $subQuery->where('program_enrollment.status', 'approved')
                                     ->where('program_enrollment.isFinished', 0);
                        });
                    } elseif ($studentStatus == 'not_started') {
                        $query->whereHas('student', function ($subQuery) {
                            $subQuery->where(function ($innerQuery) {
                                $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                    $subSubQuery->select('ID_Student')
                                                ->from('program_enrollment');
                                })
                                ->orWhereHas('programs', function ($pendingQuery) {
                                    $pendingQuery->where('program_enrollment.status', 'pending');
                                });
                            });
                        });
                    }
                })                    
                ->paginate(5);
            } else if (Auth::user()->hasRole('staff')) {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                $users = User::role('student')
                    ->whereHas('student', function ($query) use ($staffStudyProgram) {
                        $query->where('isActive', 1)
                            ->where('ID_study_program', $staffStudyProgram);
                    })
                    ->where(function ($query) use ($search) {
                        $query->where('name', 'like', '%' . $search . '%')
                            ->orWhere('email', 'like', '%' . $search . '%')
                            ->orWhere('username', 'like', '%' . $search . '%');
                    })
                    ->when($request->filled('study_program'), function ($query) use ($request) {
                        $query->whereHas('student', function ($subQuery) use ($request) {
                            $subQuery->where('ID_study_program', $request->study_program);
                        });
                    })
                    ->where(function ($query) use ($request) {
                        if ($request->filled('year')) {
                            $year = $request->year;
                            $query->whereHas('student', function ($subQuery) use ($year) {
                                $subQuery->whereRaw("SUBSTRING(Student_ID_Number, 5, 2) = ?", [substr($year, -2)]);
                            });
                        }
                    })
                    ->when($request->filled('studentStatus'), function ($query) use ($request) {
                        $studentStatus = $request->input('studentStatus');
                    
                        if ($studentStatus == 'completed') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 1);
                            });
                        } elseif ($studentStatus == 'in_progress') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 0);
                            });
                        } elseif ($studentStatus == 'not_started') {
                            $query->whereHas('student', function ($subQuery) {
                                $subQuery->where(function ($innerQuery) {
                                    $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                        $subSubQuery->select('ID_Student')
                                                    ->from('program_enrollment');
                                    })
                                    ->orWhereHas('programs', function ($pendingQuery) {
                                        $pendingQuery->where('program_enrollment.status', 'pending');
                                    });
                                });
                            });
                        }
                    })                    
                    ->paginate(5);
            }
        } elseif ($role == 'staff') {
            $users = User::role('staff')
                ->where(function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%')
                        ->orWhere('username', 'like', '%' . $search . '%');
                })
                ->paginate(5);

            } elseif ($status == 'waiting') {
                if (Auth::user()->hasRole('staff')) {
                    $staffStudyProgram = auth()->user()->staff->studyProgram->study_program_Name;

                    $usersQuery = User::role('student')
                        ->whereHas('student', function ($query) {
                            $query->where('status', 'waiting');
                        });

                    if ($search) {
                        $usersQuery->where(function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%")
                                ->orWhere('email', 'like', "%$search%")
                                ->orWhere('username', 'like', '%' . $search . '%');
                        });
                    }

                    $users = $usersQuery->paginate(5);

                    $validUsers = $users->filter(function ($user) use ($staffStudyProgram) {
                        $studentStudyProgram = $user->student->studyProgram->study_program_Name;
                        return $studentStudyProgram == $staffStudyProgram;
                    });

                    $users = new \Illuminate\Pagination\LengthAwarePaginator(
                        $validUsers->forPage(1, 5),
                        $validUsers->count(),
                        5,
                        1,
                        ['path' => url()->current()]
                    );

                    $users->appends(['role' => $role, 'status' => $status]);

                } else if (Auth::user()->hasRole('admin')) {
                    $validStudyPrograms = StudyProgram::pluck('study_program_Name')->toArray();

                    $usersQuery = User::role('student')
                        ->whereHas('student', function ($query) {
                            $query->where('status', 'waiting');
                        });

                    if ($search) {
                        $usersQuery->where(function ($query) use ($search) {
                            $query->where('name', 'like', "%$search%")
                                ->orWhere('email', 'like', "%$search%")
                                ->orWhere('username', 'like', '%' . $search . '%');
                        });
                    }

                    $users = $usersQuery->get()->filter(function ($user) use ($validStudyPrograms) {
                        $studentStudyProgram = $user->student->studyProgram->study_program_Name;
                        return in_array($studentStudyProgram, $validStudyPrograms);
                    });

                    $users = new \Illuminate\Pagination\LengthAwarePaginator(
                        $users->forPage(1, 5),
                        $users->count(),
                        5,
                        1,
                        ['path' => url()->current()]
                    );

                    $users->appends(['role' => $role, 'status' => $status]);
                }

                foreach ($users as $user) {
                    $programNames[$user->id] = $user->student->studyProgram->study_program_Name;
                }
            } else {
            if (Auth::user()->hasRole('admin')) {
                $users = User::when($role, function ($query, $role) {
                    return $query->role($role);
                })
                    ->where('username', '!=', 'admin')
                    ->where(function ($query) {
                        $query->whereHas('student', function ($subQuery) {
                            $subQuery->where('isVerified', 1);
                        });
                    })
                    ->where(function ($query) use ($search) {
                        if ($search) {
                            $query->where('name', 'like', '%' . $search . '%')
                                ->orWhere('email', 'like', '%' . $search . '%')
                                ->orWhere('username', 'like', '%' . $search . '%');
                        }
                    })
                    ->where(function ($query) use ($request) {
                        if ($request->filled('study_program')) {
                            $query->whereHas('student', function ($subQuery) use ($request) {
                                $subQuery->where('ID_study_program', $request->study_program);
                            });
                        }
                    })
                    ->where(function ($query) use ($request) {
                        if ($request->filled('year')) {
                            $year = $request->year;
                            $query->whereHas('student', function ($subQuery) use ($year) {
                                $subQuery->whereRaw("SUBSTRING(Student_ID_Number, 5, 2) = ?", [substr($year, -2)]);
                            });
                        }
                    })
                    ->when($request->filled('studentStatus'), function ($query) use ($request) {
                        $studentStatus = $request->input('studentStatus');
                    
                        if ($studentStatus == 'completed') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 1);
                            });
                        } elseif ($studentStatus == 'in_progress') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 0);
                            });
                        } elseif ($studentStatus == 'not_started') {
                            $query->whereHas('student', function ($subQuery) {
                                $subQuery->where(function ($innerQuery) {
                                    $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                        $subSubQuery->select('ID_Student')
                                                    ->from('program_enrollment');
                                    })
                                    ->orWhereHas('programs', function ($pendingQuery) {
                                        $pendingQuery->where('program_enrollment.status', 'pending');
                                    });
                                });
                            });
                        }
                    })                    
                    ->paginate(5);
            } else {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                $users = User::role('student')
                    ->whereHas('student', function ($query) use ($staffStudyProgram) {
                        $query->whereIn('isActive', [1, 0])
                            ->where('isVerified', 1)
                            ->where('ID_study_program', $staffStudyProgram);
                    })
                    ->where(function ($query) use ($search) {
                        if ($search) {
                            $query->where('name', 'like', '%' . $search . '%')
                                ->orWhere('email', 'like', '%' . $search . '%')
                                ->orWhere('username', 'like', '%' . $search . '%');
                        }
                    })
                    ->when($request->filled('study_program'), function ($query) use ($request) {
                        $query->whereHas('student', function ($subQuery) use ($request) {
                            $subQuery->where('ID_study_program', $request->study_program);
                        });
                    })
                    ->when($request->filled('year'), function ($query) use ($request) {
                        $year = $request->year;
                        $query->whereHas('student', function ($subQuery) use ($year) {
                            $subQuery->whereRaw("SUBSTRING(Student_ID_Number, 5, 2) = ?", [substr($year, -2)]);
                        });
                    })
                    ->when($request->filled('studentStatus'), function ($query) use ($request) {
                        $studentStatus = $request->input('studentStatus');
                    
                        if ($studentStatus == 'completed') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 1);
                            });
                        } elseif ($studentStatus == 'in_progress') {
                            $query->whereHas('student.programs', function ($subQuery) {
                                $subQuery->where('program_enrollment.status', 'approved')
                                         ->where('program_enrollment.isFinished', 0);
                            });
                        } elseif ($studentStatus == 'not_started') {
                            $query->whereHas('student', function ($subQuery) {
                                $subQuery->where(function ($innerQuery) {
                                    $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                        $subSubQuery->select('ID_Student')
                                                    ->from('program_enrollment');
                                    })
                                    ->orWhereHas('programs', function ($pendingQuery) {
                                        $pendingQuery->where('program_enrollment.status', 'pending');
                                    });
                                });
                            });
                        }
                    })                    
                    ->paginate(5);
            }
        }

        return view('dashboard.admin.users.index', compact('users', 'waitingCount', 'programNames', 'data', 'studyPrograms', 'years'));
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

    public function storeStudent(Request $request)
    {
        $request->validate([
            'nim' => 'required',
        ]);

        $nim = $request->nim;
        $tokenResponse = $this->loginAndGetToken();

        if ($tokenResponse['status'] != 200) {
            throw ValidationException::withMessages([
                'email' => 'Login failed: ' . $tokenResponse['message'],
            ]);
        }

        $accessToken = $tokenResponse['access_token'];

        $response = Http::withOptions(['verify' => false])
            ->withHeaders([
                'Authorization' => 'Bearer ' . $accessToken
            ])
            ->withBody(json_encode([
                'nim' => $nim,
            ]), 'application/json')
            ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');

        if ($response->successful()) {
            $mahasiswaData = $response->json();

            if (empty($mahasiswaData['mahasiswas'])) {
                return redirect()->back()->with('error', 'NIM not valid or not found.');
            }

            $mahasiswa = $mahasiswaData['mahasiswas'][0];

            $namaMahasiswa = $mahasiswa['nama_mahasiswa'] ?? 'No Name';
            $emailMahasiswa = $mahasiswa['email'] ?? "{$nim}@unhas.ac.id";
            $nik = $mahasiswa['nik'] ?? null;
            $gender = $mahasiswa['jenis_kelamin'] ?? null;
            $nisn = $mahasiswa['nisn'] ?? null;
            $phoneNumber = $mahasiswa['handphone'] ?? null;
            $homePhone = $mahasiswa['telepon'] ?? null;
            $address = $mahasiswa['jalan'] ?? null;
            $birthPlace = $mahasiswa['tempat_lahir'] ?? null;
            $birthDate = $mahasiswa['tanggal_lahir'] ?? null;
            $programName = $mahasiswa['prodi']['nama_resmi'];

            $studyProgram = StudyProgram::where('study_program_Name', $programName)->first();

            if (!$studyProgram) {
                // dd('Program Name: ', $programName);
                return redirect()->back()->with('error', 'The study program is not available for the international class.');
            }

            $studyProgramId = $studyProgram->ID_study_program;

            $user = auth()->user();

            // Pengecekan apakah user adalah admin
            if ($user->hasRole('admin')) {
                $nim = strtoupper($nim);

                $student = Student::where('Student_ID_Number', $nim)->first();

                if ($student) {
                    $student->update([
                        'status' => 'accepted',
                        'isActive' => 1,
                        'isVerified' => 1,
                    ]);

                    return redirect()->route('admin.user.index')->with('success', 'Student updated successfully.');
                } else {
                    $user = User::create([
                        'name' => ucfirst($namaMahasiswa),
                        'username' => $nim,
                        'email' => $emailMahasiswa,
                        'password' => bcrypt("{$nim}@internasional"),
                    ]);

                    $user->assignRole('student');

                    Student::create([
                        'Student_Name' => ucfirst($namaMahasiswa),
                        'Student_ID_Number' => strtoupper($nim),
                        'Student_Email' => $emailMahasiswa,
                        'Gender' => $gender,
                        'NIK' => $nik,
                        'NISN' => $nisn,
                        'Phone_Number' => $phoneNumber,
                        'Home_Phone' => $homePhone,
                        'Address' => $address,
                        'Birth_Place' => $birthPlace,
                        'Birth_Date' => $birthDate,
                        'user_id' => $user->id,
                        'status' => 'accepted',
                        'isActive' => 1,
                        'isVerified' => 1,
                        'ID_study_program' => $studyProgramId,
                    ]);

                    return redirect()->route('admin.user.index')->with('success', 'Student added successfully.');
                }
            } elseif ($user->hasRole('staff')) {
                $staffStudyProgramId = $user->staff->ID_study_program;

                if ($studyProgramId !== $staffStudyProgramId) {
                    return redirect()->back()->with('error', 'The student is not under your authority.');
                }

            }

            $nim = strtoupper($nim);

            $student = Student::where('Student_ID_Number', $nim)->first();

            if ($student) {
                $student->update([
                    'status' => 'accepted',
                    'isActive' => 1,
                    'isVerified' => 1,
                ]);

                return redirect()->route('admin.user.index')->with('success', 'Student updated successfully.');
            } else {
                $user = User::create([
                    'name' => ucfirst($namaMahasiswa),
                    'username' => $nim,
                    'email' => $emailMahasiswa,
                    'password' => bcrypt("{$nim}@internasional"),
                ]);

                $user->assignRole('student');

                Student::create([
                    'Student_Name' => ucfirst($namaMahasiswa),
                    'Student_ID_Number' => strtoupper($nim),
                    'Student_Email' => $emailMahasiswa,
                    'Gender' => $gender,
                    'NIK' => $nik,
                    'NISN' => $nisn,
                    'Phone_Number' => $phoneNumber,
                    'Home_Phone' => $homePhone,
                    'Address' => $address,
                    'Birth_Place' => $birthPlace,
                    'Birth_Date' => $birthDate,
                    'user_id' => $user->id,
                    'status' => 'accepted',
                    'isActive' => 1,
                    'isVerified' => 1,
                    'ID_study_program' => $studyProgramId,
                ]);

                return redirect()->route('admin.user.index')->with('success', 'Student added successfully.');
            }
        } else {
            throw ValidationException::withMessages([
                'email' => 'Failed to retrieve student data!',
            ]);
        }
    }

    public function updateEnglishScore(Request $request, $userId)
    {
        $request->validate([
            'English_Score' => 'required|numeric',
        ]);

        $user = User::find($userId);

        if ($user) {
            $user->student->English_Score = $request->English_Score;
            $user->student->save();

            return redirect()->back()->with('success', 'English score updated successfully!');
        }

        return redirect()->back()->with('error', 'User not found');
    }

    public function generatePdf(Request $request)
    {
        $staffStudyProgramName = auth()->user()->hasRole('staff') 
            ? auth()->user()->staff->studyProgram->study_program_Name ?? null 
            : null;

        $role = $request->input('role');

        $usersQuery = User::role('student')
            ->whereHas('student', function ($query) use ($request, $staffStudyProgramName, $role) {
                $query->where('isVerified', 1);
    
                if ($role === 'student') {
                    $query->where('isActive', 1);
                }

                if ($request->filled('search')) {
                    $query->where('Student_Name', 'like', '%' . $request->search . '%');
                }
    
                if ($staffStudyProgramName) {
                    $query->whereHas('studyProgram', function ($subQuery) use ($staffStudyProgramName) {
                        $subQuery->where('study_program_Name', $staffStudyProgramName);
                    });
                } elseif ($request->filled('study_program')) {
                    $query->where('id_study_program', $request->study_program);
                }
    
                if ($request->filled('year')) {
                    $query->whereRaw("CONCAT('20', SUBSTRING(Student_ID_Number, 5, 2)) = ?", [$request->year]);
                }
            })
            ->when($request->filled('studentStatus'), function ($query) use ($request) {
                $studentStatus = $request->input('studentStatus');
    
                if ($studentStatus == 'completed') {
                    $query->whereHas('student.programs', function ($subQuery) {
                        $subQuery->where('program_enrollment.status', 'approved')
                                 ->where('program_enrollment.isFinished', 1);
                    });
                } elseif ($studentStatus == 'in_progress') {
                    $query->whereHas('student.programs', function ($subQuery) {
                        $subQuery->where('program_enrollment.status', 'approved')
                                 ->where('program_enrollment.isFinished', 0);
                    });
                } elseif ($studentStatus == 'not_started') {
                    $query->whereHas('student', function ($subQuery) {
                        $subQuery->where(function ($innerQuery) {
                            $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                $subSubQuery->select('ID_Student')
                                            ->from('program_enrollment');
                            })
                            ->orWhereHas('programs', function ($pendingQuery) {
                                $pendingQuery->where('program_enrollment.status', 'pending');
                            });
                        });
                    });
                }
            })
            ->with(['student.programs' => function ($query) {
                $query->withPivot('isFinished');
            }]);
    
        $users = $usersQuery->get();
    
        $groupedByStudyProgram = $users->groupBy(function ($user) {
            return $user->student->ID_study_program;
        });
    
        $study_program_name = $staffStudyProgramName ?? StudyProgram::find($request->study_program)->study_program_Name ?? null;
    
        $programsData = [];
        foreach ($groupedByStudyProgram as $studyProgramId => $usersInProgram) {
            $groupedByYear = $usersInProgram->groupBy(function ($user) {
                return '20' . substr($user->student->Student_ID_Number, 4, 2); // Menyaring angkatan dari NIM
            });
    
            $groupedByYear = $groupedByYear->sortKeys();
    
            $programsData[] = [
                'studyProgram' => StudyProgram::find($studyProgramId),
                'groupedByYear' => $groupedByYear
            ];
        }
    
        $data = [
            'users' => $users,
            'year' => $request->year,
            'programsData' => $programsData,
            'study_program_name' => $study_program_name,
        ];
    
        $fileName = ($study_program_name ?? 'semua_prodi') . '_' . ($request->year ?? 'semua_angkatan') . '.pdf';
        $fileName = str_replace(' ', '_', strtolower($fileName)); // Format nama file
    
        $pdf = PDF::loadView('dashboard.admin.pdf', $data);
        return $pdf->stream($fileName);
    }
    public function previewPdf(Request $request)
    {
        $staffStudyProgramName = auth()->user()->hasRole('staff') 
            ? auth()->user()->staff->studyProgram->study_program_Name ?? null 
            : null;
    
        $role = $request->input('role');
    
        $usersQuery = User::role('student')
            ->whereHas('student', function ($query) use ($request, $staffStudyProgramName, $role) {
                $query->where('isVerified', 1);
    
                if ($role === 'student') {
                    $query->where('isActive', 1);
                }
    
                if ($request->filled('search')) {
                    $query->where('Student_Name', 'like', '%' . $request->search . '%');
                }
    
                if ($staffStudyProgramName) {
                    $query->whereHas('studyProgram', function ($subQuery) use ($staffStudyProgramName) {
                        $subQuery->where('study_program_Name', $staffStudyProgramName);
                    });
                } elseif ($request->filled('study_program')) {
                    $query->where('id_study_program', $request->study_program);
                }
    
                if ($request->filled('year')) {
                    $query->whereRaw("CONCAT('20', SUBSTRING(Student_ID_Number, 5, 2)) = ?", [$request->year]);
                }
            })
            ->when($request->filled('studentStatus'), function ($query) use ($request) {
                $studentStatus = $request->input('studentStatus');
    
                if ($studentStatus == 'completed') {
                    $query->whereHas('student.programs', function ($subQuery) {
                        $subQuery->where('program_enrollment.status', 'approved')
                                 ->where('program_enrollment.isFinished', 1);
                    });
                } elseif ($studentStatus == 'in_progress') {
                    $query->whereHas('student.programs', function ($subQuery) {
                        $subQuery->where('program_enrollment.status', 'approved')
                                 ->where('program_enrollment.isFinished', 0);
                    });
                } elseif ($studentStatus == 'not_started') {
                    $query->whereHas('student', function ($subQuery) {
                        $subQuery->where(function ($innerQuery) {
                            $innerQuery->whereNotIn('ID_Student', function ($subSubQuery) {
                                $subSubQuery->select('ID_Student')
                                            ->from('program_enrollment');
                            })
                            ->orWhereHas('programs', function ($pendingQuery) {
                                $pendingQuery->where('program_enrollment.status', 'pending');
                            });
                        });
                    });
                }
            })
            ->with(['student.programs' => function ($query) {
                $query->withPivot('isFinished');
            }]);
    
        $users = $usersQuery->get();
    
        $groupedByStudyProgram = $users->groupBy(function ($user) {
            return $user->student->ID_study_program;
        });
    
        $study_program_name = $staffStudyProgramName ?? StudyProgram::find($request->study_program)->study_program_Name ?? null;
    
        $programsData = [];
        foreach ($groupedByStudyProgram as $studyProgramId => $usersInProgram) {
            $groupedByYear = $usersInProgram->groupBy(function ($user) {
                return '20' . substr($user->student->Student_ID_Number, 4, 2); 
            });
    
            $groupedByYear = $groupedByYear->sortKeys();
    
            $programsData[] = [
                'studyProgram' => StudyProgram::find($studyProgramId),
                'groupedByYear' => $groupedByYear
            ];
        }
    
        return view('dashboard.admin.preview-pdf', [
            'programsData' => $programsData,
            'study_program_name' => $study_program_name,
        ]);
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
            $status = ($isActive == 1) ? 'accepted' : null;

            $user->student->isActive = $isActive;
            $user->student->status = $status;
            $user->student->save();

            if ($isActive == 1) {
                $user->givePermissionTo('choose program');
            }
        }

        $action = $request->input('action');

        if (in_array($action, ['accept', 'reject'])) {
            $programName = $user->student->studyProgram->study_program_Name;

            $studyProgram = StudyProgram::where('study_program_Name', $programName)->first();

            $studyProgramId = $studyProgram->ID_study_program;

            if (Auth::user()->hasRole('staff')) {
                $staffStudyProgram = auth()->user()->staff->ID_study_program;

                if ($staffStudyProgram != $studyProgramId) {
                    return redirect()->route('admin.user.index')->with('error', 'Anda tidak memiliki akses untuk mahasiswa di program studi ini.');
                }
            }

            $isVerified = $action === 'accept' ? 1 : 0;

            Student::updateOrCreate(
                ['user_id' => $user->id],
                [
                    'Student_Name' => $user->name,
                    'Student_ID_Number' => $user->username,
                    'Student_Email' => $user->email,
                    'isActive' => $action === 'accept' ? 1 : 0,
                    'isVerified' => $isVerified,
                    'status' => $action === 'accept' ? 'accepted' : 'rejected',
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

    public function updateStatus(Student $student)
    {
        if ($student->status !== 'waiting') {
            $student->status = 'waiting';
            $student->save();

            return redirect()->back()->with('success', 'Request has been submitted successfully.');
        }

        return redirect()->back()->with('info', 'Status sudah dalam status "waiting".');
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
