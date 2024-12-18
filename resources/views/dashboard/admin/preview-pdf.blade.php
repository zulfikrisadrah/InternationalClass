<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            padding: 20px;
            display: flex;
            justify-content: center;
        }

        .print-preview {
            width: 210mm; 
            height: 297mm; 
            padding: 15mm; 
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            margin-bottom: 20px;
            overflow: auto; 
        }

        h1 {
            text-align: center;
            font-size: 20px; 
            margin-bottom: 30px;
        }

        p {
            font-size: 12px;
            margin: 3px 0;
            text-align: center;
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
            border-spacing: 0; 
            margin-bottom: 30px;
        }

        th, td {
            padding: 8px 4px;
            border: 1px solid #ccc;
            text-align: left;
            word-wrap: break-word; 
            font-size: 12px; 
        }

        th {
            background-color: #f2f2f2;
            text-align: center;
        }

        td {
            word-wrap: break-word; 
        }

        .center {
            text-align: center;
        }

        .no-data {
            text-align: center;
            font-style: italic;
            color: #666;
        }

        /* Menentukan lebar kolom dalam piksel */
        th:nth-child(1), td:nth-child(1) { max-width: 20px; }  /* No */
        th:nth-child(2), td:nth-child(2) { max-width: 70px; }  /* NIM */
        th:nth-child(3), td:nth-child(3) { max-width: 120px; }  /* Nama Mahasiswa */
        th:nth-child(4), td:nth-child(4) { max-width: 90px; }  /* HP */
        th:nth-child(5), td:nth-child(5) { max-width: 70px; }  /* Jenis Kelamin */
        th:nth-child(6), td:nth-child(6) { max-width: 80px; }  /* Kegiatan IE */
        th:nth-child(7), td:nth-child(7) { max-width: 80px; }  /* Jenis IE */
        th:nth-child(8), td:nth-child(8) { max-width: 80px; }  /* Tanggal IE */
        th:nth-child(9), td:nth-child(9) { max-width: 80px; }  /* Lokasi IE */
        th:nth-child(10), td:nth-child(10) { max-width: 40px; }  /* Nilai SKS IE */
        th:nth-child(11), td:nth-child(11) { max-width: 45px; }  /* Nilai Bahasa Inggris */

        @media print {
            body {
                margin: 0;
            }

            .print-preview {
                width: 210mm;
                height: 297mm;
                padding: 10mm;
                box-shadow: none;
            }
        }

    </style>
</head>
<body>
<div class="print-preview">
    <h1>DAFTAR MAHASISWA KELAS INTERNASIONAL<br>UNIVERSITAS HASANUDDIN</h1>

    @foreach ($programsData as $programData)
        <div>
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
                                        <td class="center">{{ $program->Course_Credits ?? '-' }}</td>
                                        <td class="center">{{ $user->student->English_Score ?? '-' }}</td>
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
                                    <td class="center">-</td>
                                    <td class="center">{{ $user->student->English_Score ?? '-' }}</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        </div>
    @endforeach
</div>
</body>
</html>
