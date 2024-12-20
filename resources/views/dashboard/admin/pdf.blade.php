<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa Kelas Internasional</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            line-height: 1.4;
            margin: 10mm;
        }

        h1 {
            text-align: center;
            font-size: 20px;
            margin-bottom: 30px;
        }

        h4 {
            margin: 8px 0;
            display: flex;
            align-items: center;
        }

        h4 span {
            margin-right: 10px; /* Memberikan jarak antara label dan nilai */
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            padding: 8px 4px;
            border: 1px solid #ccc;
            text-align: left;
            font-size: 10px;
        }

        th {
            background-color: #f2f2f2;
            font-weight: bold;
            text-align: center;
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
    <h1>DAFTAR MAHASISWA KELAS INTERNASIONAL<br>UNIVERSITAS HASANUDDIN</h1>

    @foreach ($programsData as $programData)
        <h4><span>Program Studi :</span> {{ $programData['studyProgram']->study_program_Name }}</h4>

        @foreach ($programData['groupedByYear'] as $year => $usersByYear)
            <h4><span>Angkatan :</span> {{ $year }}</h4>

            <table>
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th>HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Kegiatan IE</th>
                        <th>Jenis IE</th>
                        <th>Tanggal IE</th>
                        <th>Lokasi IE</th>
                        <th>Nilai SKS IE</th>
                        <th>Nilai Bahasa Inggris</th>
                    </tr>
                </thead>
                <tbody>
                    @php $no = 1; @endphp
                    @foreach ($usersByYear as $user)
                        @if ($user->student && $user->student->programs->isNotEmpty())
                            @foreach ($user->student->programs as $program)
                                <tr>
                                    <td class="center">{{ $no++ }}</td>
                                    <td class="center">{{ $user->student->Student_ID_Number ?? '-' }}</td>
                                    <td class="center">{{ $user->name ?? '-' }}</td>
                                    <td class="center">{{ $user->student->Phone_Number ?? '-' }}</td>
                                    <td class="center">{{ $user->student->Gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                    <td class="center">{{ $program->program_Name ?? 'Tidak ada kegiatan' }}</td>
                                    <td class="center">{{ $program->ieProgram->ie_program_name ?? 'Tidak ada kegiatan' }}</td>
                                    <td class="center">
                                        {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d F Y') }} - 
                                        {{ \Carbon\Carbon::parse($program->End_Date)->format('d F Y') }}
                                    </td>
                                    <td class="center">{{ $program->Country_of_Execution ?? 'Tidak ada kegiatan' }}</td>
                                    <td class="center" style="width: 30px">{{ $program->Course_Credits ?? '-' }}</td>
                                    <td class="center" style="width: 35px">{{ $user->student->English_Score ?? '-' }}</td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td class="center">{{ $no++ }}</td>
                                <td class="center">{{ $user->student->Student_ID_Number ?? '-' }}</td>
                                <td class="center">{{ $user->name ?? '-' }}</td>
                                <td class="center">{{ $user->student->Phone_Number ?? '-' }}</td>
                                <td class="center">{{ $user->student->Gender == 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                                <td colspan="4" class="no-data">Belum selesai / mengikuti program IE</td>
                                <td class="center" style="width: 30px">-</td>
                                <td class="center" style="width: 35px">{{ $user->student->English_Score ?? '-' }}</td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        @endforeach
    @endforeach
</body>
</html>
