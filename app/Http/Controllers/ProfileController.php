<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        $user = Auth::user();
    
        try {
            $student = $user->student; 
    
            if ($student) {
                return view('profile.edit', [
                    'nik' => $student->NIK ?? '-',
                    'nisn' => $student->NISN ?? '-',
                    'handphone' => $student->Phone_Number ?? null,
                    'telepon' => $student->Home_Phone ?? null,
                    'email' => $student->Student_Email ?? null,
                    'jalan' => $student->Address ?? null,
                    'kode_pos' => $student->Postal_Code ?? null,
                    'tempat_lahir' => $student->Birth_Place ?? null,
                    'tanggal_lahir' => $student->Birth_Date ?? null,
                    'user' => $user
                ]);
            } else {
                return back()->with('error', 'Data mahasiswa tidak ditemukan.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $data = $request->all();
    
        // Ambil data user yang sedang login
        $user = $request->user();
        
        // Update data user
        $user->fill($data);
        
        if ($request->filled('new_password')) {
            $request->validate([
                'current_password' => 'required',
                'new_password' => 'required|min:6|confirmed', 
            ]);
    
            if (!Hash::check($request->current_password, $user->password)) {
                return back()->with('error', 'Password lama tidak sesuai.');
            }
    
            $user->password = Hash::make($request->new_password);
        }

        // Simpan perubahan pada user jika ada
        if ($user->isDirty()) {
            $user->save();
        }
        
        if ($user->student) {
            $studentData = [
                'Student_Name' => $data['name'], 
                'Student_Email' => $data['email'],
                'Phone_Number' => $data['handphone'] ?? null, 
                'Home_Phone' => $data['telepon'] ?? $user->student->Home_Phone, 
                'Address' => $data['jalan']?? null, 
                'Postal_Code' => $data['kode_pos'] ?? null, 
                'Birth_Place' => $data['tempat_lahir'] ?? null, 
                'Birth_Date' => $data['tanggal_lahir'] ?? null, 
            ];
    
            $user->student->update($studentData);
        }
    
        return Redirect::route('dashboard')->with('status', 'profile-updated');
    }    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
