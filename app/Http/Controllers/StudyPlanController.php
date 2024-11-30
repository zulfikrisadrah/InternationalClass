<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class StudyPlanController extends Controller
{
    public function index(Request $request)
    {
        // Cek apakah pengguna sudah login
        if (Auth::check()) {
            $user = Auth::user();
            $nim = $user->username;
    
            $currentYear = date('Y');
    
            $angkatan = intval(substr($nim, 4, 2)); 
            $tahunMasuk = 2000 + $angkatan; 
    
            $maxYear = min($tahunMasuk + 7, 2024);
    
            $semesters = [];
            for ($tahun = $tahunMasuk; $tahun <= $maxYear; $tahun++) {
                $semesters[] = "{$tahun}1"; 
                $semesters[] = "{$tahun}2"; 
            }
    
            $semester = $request->input('semester', reset($semesters)); 
    
            $mataKuliahData = $this->getKrsMahasiswa($nim, $semester);
            $message = $mataKuliahData ? 'Data berhasil diambil' : 'Data KRS tidak ditemukan';
    
            return view('dashboard.student.studyPlan', compact('mataKuliahData', 'message', 'semester', 'semesters'));
        } else {
            return redirect()->route('login')->with('error', 'You need to be logged in to access this page.');
        }
    }
    
    private function loginAndGetToken()
    {
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
                    'message' => 'Access token tidak ditemukan.',
                ];
            }
        } else {
            return [
                'status' => $loginResponse->status(),
                'message' => 'Login gagal. Status: ' . $loginResponse->status(),
            ];
        }
    }

    public function getKrsMahasiswa($nim, $semester)
    {
        $tokenData = $this->loginAndGetToken();
        
        if ($tokenData['status'] == 200) {
            $accessToken = $tokenData['access_token'];
        
            $response = Http::withOptions(['verify' => false])
                ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                ->withBody(json_encode(['nim' => $nim, 'semester' => $semester]), 'application/json')
                ->get('https://sipakamase.unhas.ac.id:8107/get_krs_mahasiswa');
        
            if ($response->successful()) {
                $krsData = $response->json();
                
                if (isset($krsData['krs']) && is_array($krsData['krs'])) {
                    $mataKuliahData = [];
                    foreach ($krsData['krs'] as $item) {
                        if (isset($item['nama_mata_kuliah'], $item['jumlah_sks'])) {
                            $mataKuliahData[] = [
                                'nama_mata_kuliah' => $item['nama_mata_kuliah'],
                                'jumlah_sks' => $item['jumlah_sks']
                            ];
                        }
                    }
        
                    return $mataKuliahData;  
                } else {
                    return null;  
                }
            }
        } else {
            return null; 
        }
    }
}
