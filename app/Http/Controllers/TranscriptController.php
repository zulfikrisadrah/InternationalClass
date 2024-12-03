<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TranscriptController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $nim = $user->username;

        $transcriptData = $this->getTranscript($nim);

        $message = $transcriptData['status'] === 200 ? 'Data berhasil diambil' : 'Gagal mengambil data: ' . $transcriptData['message'];

        return view('dashboard.student.transcript', [
            'processedTranscripts' => $transcriptData['data'] ?? [],
            'namaMahasiswa' => $transcriptData['namaMahasiswa'] ?? 'Tidak Tersedia',
            'nim' => $transcriptData['nim'] ?? 'Tidak Tersedia',
            'message' => $message,
        ]);
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

    public function getTranscript($nim)
    {
        $tokenData = $this->loginAndGetToken();

        if ($tokenData['status'] == 200) {
            $accessToken = $tokenData['access_token'];

            $response = Http::withOptions(['verify' => false])
                ->withHeaders(['Authorization' => 'Bearer ' . $accessToken])
                ->withBody(json_encode(['nim' => $nim]), 'application/json')
                ->get('https://sipakamase.unhas.ac.id:8107/get_transkrip_mahasiswa');

            if ($response->successful()) {
                $data = $response->json();

                $transcripts = $data['transkrips'] ?? [];
                $processedTranscripts = [];
                foreach ($transcripts as $transcript) {
                    $processedTranscripts[] = [
                        'kode' => $transcript['kode_mata_kuliah'],
                        'mata_kuliah' => $transcript['nama_mata_kuliah'],
                        'sks' => $transcript['sks'],
                        'huruf' => $transcript['nilai_huruf'],
                        'angka' => $transcript['nilai_angka'],
                        'total' => $transcript['total_nilai'],
                    ];
                }

                return [
                    'status' => 200,
                    'data' => $processedTranscripts,
                    'namaMahasiswa' => $data['mahasiswa']['nama_mahasiswa'] ?? 'Tidak Tersedia',
                    'nim' => $data['mahasiswa']['nim'] ?? 'Tidak Tersedia',
                ];
            }

            return [
                'status' => $response->status(),
                'message' => 'Gagal mengambil data dari API',
            ];
        }

        return [
            'status' => $tokenData['status'],
            'message' => $tokenData['message'],
        ];

    }
}
