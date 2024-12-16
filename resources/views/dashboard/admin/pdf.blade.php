<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa Kelas Internasional</title>
    <style>
        /* Styling untuk PDF */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.5;
        }

        h1 {
            text-align: center;
            font-size: 16px;
            margin-bottom: 20px;
        }

        p {
            margin: 5px 0;
            font-size: 12px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
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
    </style>
</head>

<body>
    <h1>Daftar Mahasiswa Kelas Internasional</h1>
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
                <th>Status Pendaftaran</th>
                @if (empty($year) || empty($study_program_name) || $study_program_name === 'Semua')
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
                            <td>
                                {{ $program->program_Name ?? 'Tidak ada kegiatan' }}
                            </td>
                            <td>
                                {{ $program->ieProgram->ie_program_name ?? 'Belum terdaftar' }}
                            </td>
                            <td>{{ ucfirst($program->pivot->status ?? 'Pending') }}</td>
                            @if (empty($year) || empty($study_program_name) || $study_program_name === 'Semua')
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
                        <td colspan="2" class="no-data">Belum terdaftar dalam program</td>
                        <td>Pending</td>
                        @if (empty($year) || empty($study_program_name) || $study_program_name === 'Semua')
                            <td>{{ $user->student->studyProgram->study_program_Name ?? '-' }}</td>
                        @endif
                    </tr>
                @endif
            @empty
                <tr>
                    <td colspan="{{ empty($year) || empty($study_program_name) || $study_program_name === 'Semua' ? 8 : 7 }}" class="no-data">Tidak ada data mahasiswa ditemukan.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
