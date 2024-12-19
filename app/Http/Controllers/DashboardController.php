<?php

namespace App\Http\Controllers;

use App\Models\Program;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    private function generateChartColors($index)
    {
        $colors = [
            ['background' => '#36B9CC', 'border' => '#36B9CC'],
            ['background' => '#FF6B9A', 'border' => '#FF6B9A'],
            ['background' => '#FFB84D', 'border' => '#FFB84D'],
            ['background' => '#0077FF', 'border' => '#0077FF']
        ];
        $colorIndex = $index % count($colors);

        return $colors[$colorIndex];
    }


    private function getStudentQuery($studentStatus, $studyProgramId = null)
    {
        $query = Student::join('study_programs', 'students.ID_study_program', '=', 'study_programs.ID_study_program')
            ->select('students.Student_ID_Number', 'study_programs.study_program_Name as program_name')
            ->where('students.isVerified', 1);

        if ($studyProgramId) {
            $query->where('study_programs.ID_study_program', $studyProgramId);
        }

        switch ($studentStatus) {
            case 'active':
                $query->where('students.isActive', true);
                break;
            case 'inactive':
                $query->where('students.isActive', false);
                break;
        }

        return $query;
    }

    private function getProgramCounts($studyProgramId = null)
    {
        $query = Program::selectRaw('count(*) as count, ID_Ie_program')
            ->groupBy('ID_Ie_program')
            ->with('ieProgram');

        if ($studyProgramId) {
            $query->whereHas('studyProgram', function ($q) use ($studyProgramId) {
                $q->where('ID_study_program', $studyProgramId);
            });
        }

        return $query->get();
    }

    private function getStudentCountsByYear($studyProgramId = null)
    {
        $query = Program::selectRaw('YEAR(execution_date) as year, count(*) as student_count')
            ->join('program_enrollment', 'program_enrollment.ID_program', '=', 'programs.ID_program')
            ->where('program_enrollment.status', 'approved')
            ->groupByRaw('YEAR(execution_date)')
            ->with('ieProgram');

        if ($studyProgramId) {
            $query->join('students', 'program_enrollment.ID_student', '=', 'students.ID_Student')
                ->where('students.ID_study_program', $studyProgramId);
        }

        return $query->get();
    }

    private function processStudentBatches($students)
    {
        $studentBatches = [];
        $studentBatchesByProgram = [];
        $chartYears = [];

        foreach ($students as $student) {
            $angkatan = null;
            if (preg_match('/[A-NR]\d{3}(\d{2})\d{3}/', $student->Student_ID_Number, $matches)) {
                $angkatan = '20' . $matches[1];
            }

            if ($angkatan) {
                $programName = $student->program_name;

                // Add to chart years if not exists
                if (!in_array($angkatan, $chartYears)) {
                    $chartYears[] = $angkatan;
                }

                // Count total students per batch
                if (!isset($studentBatches[$angkatan])) {
                    $studentBatches[$angkatan] = 0;
                }
                $studentBatches[$angkatan]++;

                // Count students per program and batch
                if (!isset($studentBatchesByProgram[$programName][$angkatan])) {
                    $studentBatchesByProgram[$programName][$angkatan] = 0;
                }
                $studentBatchesByProgram[$programName][$angkatan]++;
            }
        }

        ksort($studentBatches);
        sort($chartYears);

        return [
            'batches' => $studentBatches,
            'batchesByProgram' => $studentBatchesByProgram,
            'years' => $chartYears
        ];
    }

    private function prepareChartData($studentBatchesByProgram, $chartYears)
    {
        $programLabels = array_keys($studentBatchesByProgram);
        $chartDatasets = [];

        foreach ($chartYears as $index => $year) {
            $data = [];
            foreach ($programLabels as $program) {
                $data[] = $studentBatchesByProgram[$program][$year] ?? 0;
            }

            $colors = $this->generateChartColors($index);
            $chartDatasets[] = [
                'label' => "$year",
                'data' => $data,
                'backgroundColor' => $colors['background'],
                'borderColor' => $colors['border'],
                'borderWidth' => 1,
            ];
        }

        return [
            'programLabels' => $programLabels,
            'datasets' => $chartDatasets
        ];
    }

    private function handleAdminDashboard($studentStatus)
{
    // Get filtered students
    $students = $this->getStudentQuery($studentStatus)->get();
    Log::info('Students count:', ['count' => $students->count()]);

    // Get program counts
    $programCounts = $this->getProgramCounts();
    Log::info('Program counts:', ['count' => $programCounts->count()]);

    // Get student counts by year
    $studentCountsByYear = $this->getStudentCountsByYear();
    Log::info('Student counts by year:', ['count' => $studentCountsByYear->count()]);

    // Process student batches
    $batchData = $this->processStudentBatches($students);
    Log::info('Batch data:', $batchData);

    // Prepare chart data
    $chartData = $this->prepareChartData(
        $batchData['batchesByProgram'],
        $batchData['years']
    );
    Log::info('Chart data:', $chartData);

    $data = [
        'programLabels' => $chartData['programLabels'],
        'chartDatasets' => $chartData['datasets'],
        'studentBatches' => $batchData['batches'],
        'studentBatchesByProgram' => $batchData['batchesByProgram']
    ];

    \Log::info('Final data:', $data);

    return view('dashboard.admin.home', compact(
        'programCounts',
        'data',
        'studentCountsByYear',
        'studentStatus'
    ));
}

    private function handleStaffDashboard($studentStatus, $user)
    {
        $studyProgramId = $user->staff->ID_study_program;

        // Get filtered students
        $students = $this->getStudentQuery($studentStatus, $studyProgramId)->get();

        // Get program counts
        $programCounts = $this->getProgramCounts($studyProgramId);

        // Get student counts by year
        $studentCountsByYear = $this->getStudentCountsByYear($studyProgramId);

        // Process student batches
        $batchData = $this->processStudentBatches($students);

        // Prepare chart data
        $chartData = $this->prepareChartData(
            $batchData['batchesByProgram'],
            $batchData['years']
        );

        $data = [
            'programLabels' => $chartData['programLabels'],
            'chartDatasets' => $chartData['datasets'],
            'studentBatches' => $batchData['batches'],
            'studentBatchesByProgram' => $batchData['batchesByProgram']
        ];

        return view('dashboard.staff.home', compact(
            'programCounts',
            'data',
            'studentCountsByYear',
            'studentStatus'
        ));
    }

    private function handleStudentDashboard($user)
    {
        $tokenData = $this->loginAndGetToken();
        if ($tokenData['status'] !== 200) {
            return view('dashboard.student.home')->with('error', 'Login failed: ' . $tokenData['message']);
        }

        $response = Http::withOptions(['verify' => false])
            ->withHeaders(['Authorization' => 'Bearer ' . $tokenData['access_token']])
            ->withBody(json_encode(['nim' => $user->username]), 'application/json')
            ->get('https://sipakamase.unhas.ac.id:8107/get_transkrip_mahasiswa');

        if (!$response->successful()) {
            return view('dashboard.student.home')->with('error', 'Failed to retrieve data.');
        }

        $data = $response->json();
        $dashboardData = $this->processStudentTranscript($data);

        return view('dashboard.student.home', $dashboardData);
    }

    private function processStudentTranscript($data)
    {
        $transkrip_terakhir = array_slice($data['transkrips'], -1);
        $angkatan = $data['mahasiswa']['angkatan'];
        $last_year_ajaran = isset($transkrip_terakhir[0]['semester']['tahun'])
            ? $transkrip_terakhir[0]['semester']['tahun'] + 1
            : null;
        $last_semester_ajaran = isset($transkrip_terakhir[0]['semester']['jenis'])
            ? $transkrip_terakhir[0]['semester']['jenis']
            : null;

        $masa_studi_maksimal = $angkatan <= 2022 ? 14 : 10;
        $semester_completed = ($last_year_ajaran - $angkatan) * 2 + ($last_semester_ajaran == "genap" ? 1 : 2);
        $sisa_masa_studi = $masa_studi_maksimal - $semester_completed;

        $nilai_huruf_valid = ["A", "A-", "B+", "B", "B-", "C+", "C", "D"];
        $sks_dilulusi = array_reduce($data['transkrips'], function($carry, $nilai) use ($nilai_huruf_valid) {
            return $carry + (in_array($nilai['nilai_huruf'], $nilai_huruf_valid) ? $nilai['sks'] : 0);
        }, 0);

        return [
            'indeksPrestasiKumulatif' => $data['current_indeks_prestasi']['indeks_prestasi_kumulatif'] ?? 'N/A',
            'namaMahasiswa' => $data['mahasiswa']['nama_mahasiswa'] ?? 'Tidak Tersedia',
            'nim' => $data['mahasiswa']['nim'] ?? 'Tidak Tersedia',
            'email' => $data['mahasiswa']['email'] ?? 'Tidak Tersedia',
            'namaProdi' => $data['mahasiswa']['prodi']['nama_resmi'] ?? 'Tidak Tersedia',
            'masa_studi_maksimal' => $masa_studi_maksimal,
            'sisa_masa_studi' => $sisa_masa_studi,
            'sks_dilulusi' => $sks_dilulusi
        ];
    }

    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();
        $studentStatus = $request->query('status', 'all');

        if ($user->hasRole('admin')) {
            return $this->handleAdminDashboard($studentStatus);
        }

        if ($user->hasRole('staff')) {
            return $this->handleStaffDashboard($studentStatus, $user);
        }

        if ($user->hasRole('student')) {
            return $this->handleStudentDashboard($user);
        }

        return redirect()->route('login');
    }

    private function loginAndGetToken()
    {
        $loginResponse = Http::withOptions(['verify' => false])
            ->post('https://sipakamase.unhas.ac.id:8107/login', [
                'username' => 'admin',
                'password' => 'UnhasTamalanreaMakassar',
            ]);

        if (!$loginResponse->successful()) {
            return [
                'status' => $loginResponse->status(),
                'message' => 'Login gagal. Status: ' . $loginResponse->status(),
            ];
        }

        $loginData = $loginResponse->json();
        if (!isset($loginData['access_token'])) {
            return [
                'status' => $loginResponse->status(),
                'message' => 'Access token tidak ditemukan.',
            ];
        }

        return [
            'status' => $loginResponse->status(),
            'access_token' => $loginData['access_token'],
            'message' => 'Login berhasil',
        ];
    }
}
