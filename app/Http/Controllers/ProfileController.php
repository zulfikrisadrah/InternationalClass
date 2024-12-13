<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use Illuminate\Support\Facades\Http;

class ProfileController extends Controller
{

    public function edit(Request $request): View
    {
        $user = Auth::user();
    
        try {
            $tokenData = $this->loginAndGetToken();
    
            if ($tokenData['status'] == 200 && isset($tokenData['access_token'])) {
                $accessToken = $tokenData['access_token'];
                $nim = $user->username;
    
                $response = Http::withOptions(['verify' => false])
                    ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                    ->withBody(json_encode(['nim' => $nim]), 'application/json')
                    ->get('https://sipakamase.unhas.ac.id:8107/get_mahasiswa_by_nim');
    
                if ($response->successful()) {
                    $data = $response->json();
    
                    if (isset($data['mahasiswas'][0])) {
                        $mahasiswa = $data['mahasiswas'][0];
    
                        return view('profile.edit', [
                            'nik' => $mahasiswa['nik'] ?? '-',
                            'nisn' => $mahasiswa['nisn'] ?? '-',
                            'handphone' => $mahasiswa['handphone'] ?? '-',
                            'telepon' => $mahasiswa['telepon'] ?? '-',
                            'email' => $mahasiswa['email'] ?? '-',
                            'jalan' => $mahasiswa['jalan'] ?? '-',
                            'kode_pos' => $mahasiswa['kode_pos'] ?? '-',
                            'id_wilayah' => $mahasiswa['id_wilayah'] ?? '-',
                            'tempat_lahir' => $mahasiswa['tempat_lahir'] ?? '-',
                            'tanggal_lahir' => $mahasiswa['tanggal_lahir'] ?? '-',
                            'user' => $user 
                        ]);
                    } else {
                        return back()->with('error', 'Data mahasiswa tidak ditemukan.');
                    }
                } else {
                    return back()->with('error', 'Gagal mengambil data mahasiswa.');
                }
            } else {
                return back()->with('error', 'Gagal mendapatkan token akses.');
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
        $data = $request->validated();
    
        // Ambil data user yang sedang login
        $user = $request->user();
        
        // Update data user
        $user->fill($data);
        
        // Simpan perubahan pada user jika ada
        if ($user->isDirty()) {
            $user->save();
        }
        
        if ($user->student) {
            $studentData = [
                'Student_Name' => $data['name'] ,
                'Student_Email' => $data['email'],
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
