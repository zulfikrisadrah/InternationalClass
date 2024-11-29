<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Mengambil parameter 'role' dari query string
        $role = $request->input('role');
    
        // Jika role diberikan, filter berdasarkan role tersebut
        if ($role) {
            $users = User::role($role)->get();
        } else {
            // Jika tidak ada role, tampilkan semua pengguna (staff dan student)
            $users = User::role(['student', 'staff'])->get();
        }
    
        // Kembalikan view dengan data pengguna
        return view('dashboard.admin.users.index', compact('users'));
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
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // 'password' => 'nullable|string|min:8|confirmed',
        ]);

        $data = $validated;

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password); // Hash password jika diisi
        }

        $user->update($data); // Update data user

        return redirect()->route('admin.user.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete(); // Hapus user
        return redirect()->route('admin.user.index')->with('success', 'User deleted successfully.');
    }
}
