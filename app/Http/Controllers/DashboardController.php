<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Cek apakah user memiliki peran admin
            if ($user->hasRole('admin')) {
                return view('dashboard.admin.home');
            }

            // Cek apakah user memiliki peran staff
            if ($user->hasRole('staff')) {
                return view('dashboard.staff.home');
            }

            // Cek apakah user memiliki peran student
            if ($user->hasRole('student')) {
                // Login dan dapatkan access_token menggunakan akun admin
                $tokenData = $this->loginAndGetToken();

                // Jika login berhasil dan mendapatkan access_token
                if ($tokenData['status'] == 200) {
                    $accessToken = $tokenData['access_token'];

                    // Panggil API untuk mendapatkan data transkrip mahasiswa (indeks_prestasi_kumulatif)
                    $response = Http::withOptions(['verify' => false])
                        ->withHeaders([
                            'Authorization' => 'Bearer ' . $accessToken
                        ])
                        ->withBody(json_encode([
                            'nim' => $user->username
                        ]), 'application/json')
                        ->get('https://sipakamase.unhas.ac.id:8107/get_transkrip_mahasiswa');

                    // Cek apakah API berhasil
                    if ($response->successful()) {
                        $data = $response->json();
                        $indeksPrestasiKumulatif = $data['current_indeks_prestasi']['indeks_prestasi_kumulatif'] ?? 'N/A';
                        $indeksPrestasiKumulatif = $data['current_indeks_prestasi']['indeks_prestasi_kumulatif'] ?? 'N/A';
                        $namaMahasiswa = $data['mahasiswa']['nama_mahasiswa'] ?? 'Tidak Tersedia';
                        $nim = $data['mahasiswa']['nim'] ?? 'Tidak Tersedia';
                        $email = $data['mahasiswa']['email'] ?? 'Tidak Tersedia';
                        $namaProdi = $data['mahasiswa']['prodi']['nama_resmi'] ?? 'Tidak Tersedia';
                        $angkatan = $data['mahasiswa']['angkatan'];

                        $nilai_huruf_valid = ["A", "A-", "B+", "B", "B-", "C+", "C", "D"];
                        $sks_dilulusi = 0;

                        $transkrip_terakhir = array_slice($data['transkrips'], -1); 
                        $last_year_ajaran = isset($transkrip_terakhir[0]['semester']['tahun']) ? $transkrip_terakhir[0]['semester']['tahun'] + 1 : null;
                        $last_semester_ajaran = isset($transkrip_terakhir[0]['semester']['jenis']) ? $transkrip_terakhir[0]['semester']['jenis'] : null;

                        if($last_semester_ajaran == "genap") {
                            if ($last_year_ajaran !== null) {
                                if ($angkatan <= 2022) {
                                    $masa_studi_maksimal = 14;
                                    $sisa_masa_studi = $masa_studi_maksimal - ((($last_year_ajaran - $angkatan) * 2) + 1);
                                } else {
                                    $masa_studi_maksimal = 10;
                                    $sisa_masa_studi = $masa_studi_maksimal - ((($last_year_ajaran - $angkatan) * 2) + 1);
                                }
                            }
                        } else {
                            if ($last_year_ajaran !== null) {
                                if ($angkatan <= 2022) {
                                    $masa_studi_maksimal = 14;
                                    $sisa_masa_studi = $masa_studi_maksimal - ((($last_year_ajaran - $angkatan) * 2 + 2));
                                } else {
                                    $masa_studi_maksimal = 10;
                                    $sisa_masa_studi = $masa_studi_maksimal - ((($last_year_ajaran - $angkatan) * 2 + 2));
                                }
                            }
                        }

                        $sks_dilulusi = 0;
                        foreach ($data['transkrips'] as $nilai) {
                            if (in_array($nilai['nilai_huruf'], $nilai_huruf_valid)) {
                                $sks_dilulusi += $nilai['sks'];
                            }
                        }

                        // Pass data ke view
                        return view('dashboard.student.home', compact('indeksPrestasiKumulatif', 'namaMahasiswa', 'nim', 'email', 'namaProdi', 'masa_studi_maksimal', 'sisa_masa_studi', 'sks_dilulusi'));
                    } else {
                        // Jika API gagal
                        return view('dashboard.student.home')->with('error', 'Failed to retrieve data.');
                    }
                } else {
                    // Jika login gagal atau token tidak ditemukan
                    return view('dashboard.student.home')->with('error', 'Login failed: ' . $tokenData['message']);
                }
            }
        }

        // Jika tidak ada role yang valid
        return redirect()->route('login');
    }

    // Fungsi untuk login dan mendapatkan access token
    private function loginAndGetToken()
    {
        // Melakukan POST request untuk login
        $loginResponse = Http::withOptions(['verify' => false])
            ->post('https://sipakamase.unhas.ac.id:8107/login', [
                'username' => 'admin', // Gantilah dengan username yang benar
                'password' => 'UnhasTamalanreaMakassar', // Gantilah dengan password yang benar
            ]);

        // Jika login berhasil, ambil token
        if ($loginResponse->successful()) {
            $loginData = $loginResponse->json();

            if (isset($loginData['access_token'])) {
                return [
                    'status' => $loginResponse->status(),  // Status HTTP (200 jika berhasil)
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
}
