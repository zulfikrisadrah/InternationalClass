<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa Kelas Internasional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px; 
            line-height: 1.4; 
        }

        h1 {
            text-align: center;
            font-size: 14px;
            margin-bottom: 20px;
        }

        p {
            margin: 5px 0;
            font-size: 12px; 
        }

        table {
            width: 100%;
            table-layout: auto;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 6px; 
            border: 1px solid #ddd;
            text-align: left;
            word-wrap: break-word;
        }

        th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #666;
        }

        th,
        td {
            padding: 5px 10px;
        }

        th:nth-child(1),
        td:nth-child(1) {
            width: 5%;
        }

        th:nth-child(2),
        td:nth-child(2) {
            width: 15%;
            white-space: nowrap;
        }

        th:nth-child(3),
        td:nth-child(3) {
            width: 20%;
        }

        th:nth-child(4),
        td:nth-child(4) {
            width: 20%;
            white-space: nowrap;
        }

        th:nth-child(5),
        td:nth-child(5) {
            width: 15%;
        }

        th:nth-child(6),
        td:nth-child(6) {
            width: 10%;
        }

        th:nth-child(7),
        td:nth-child(7) {
            width: 15%;
        }

        th:nth-child(9),
        td:nth-child(9) {
            width: 15%;
        }
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa Kelas Internasional<br>Universitas Hasanuddin</h1>
    <p><strong>Angkatan:</strong> {{ $year ?? 'Semua' }}</p>
    <p><strong>Program Studi:</strong> {{ $study_program_name ?? 'Semua' }}</p>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Mahasiswa</th>
                <th>Email</th>
                <th>Kegiatan IE</th>
                <th>Jenis IE</th>
                <th>Tanggal Kegiatan</th>
                <th>Status Kegiatan</th> 
                @if (empty($study_program_name) || $study_program_name === 'Semua')
                    <th>Program Studi</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @forelse($users as $user)
                @if ($user->student && $user->student->programs->isNotEmpty())
                    @foreach ($user->student->programs as $program)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $user->student->Student_ID_Number ?? '-' }}</td>
                            <td>{{ $user->name ?? '-' }}</td>
                            <td>{{ $user->email ?? '-' }}</td>
                            <td>{{ $program->program_Name ?? 'Tidak ada kegiatan' }}</td>
                            <td>{{ $program->ieProgram->ie_program_name ?? 'Belum terdaftar' }}</td>
                            <td>
                                @php
                                    $startDate = $program?->Execution_Date;
                                    $endDate = $program?->End_Date;
                                @endphp
                                {{ $startDate ? \Carbon\Carbon::parse($startDate)->format('d M Y') : '-' }}
                                @if ($endDate)
                                    - {{ \Carbon\Carbon::parse($endDate)->format('d M Y') }}
                                @endif
                            </td>
                            <td>
                                @php
                                    // Menentukan status berdasarkan nilai pivot->isFinished
                                    if ($program->pivot->status == 'pending') {
                                        $status_enroll = 'Menunggu Konfirmasi';
                                    } elseif ($program->pivot->isFinished == 1) {
                                        $status_enroll = 'Selesai';
                                    } else {
                                        $status_enroll = 'Belum Selesai';
                                    }
                                @endphp
                                {{ $status_enroll }}
                            </td>
                            @if (empty($study_program_name) || $study_program_name === 'Semua')
                                <td>{{ $user->student->studyProgram->study_program_Name ?? '-' }}</td>
                            @endif
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $user->student->Student_ID_Number ?? '-' }}</td>
                        <td>{{ $user->name ?? '-' }}</td>
                        <td>{{ $user->email ?? '-' }}</td>
                        <td colspan="4" class="no-data">Belum terdaftar dalam program</td>
                        @if (empty($study_program_name) || $study_program_name === 'Semua')
                            <td>{{ $user->student->studyProgram->study_program_Name ?? '-' }}</td>
                        @endif
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="{{ empty($year) || empty($study_program_name) || $study_program_name === 'Semua' ? 9 : 8 }}"
                        class="no-data">Tidak ada data mahasiswa ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>