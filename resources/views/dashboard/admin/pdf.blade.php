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

        p {
            font-size: 12px;
            margin: 3px 0;
            text-align: center;
        }

        h3 {
            margin: 8px 0;
            display: flex;
            align-items: center;
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

        .page-break {
            page-break-before: always;
        }

        @media print {
            body {
                margin: 10mm;
            }

            table, th, td {
                border: 1px solid #000;
            }

            /* Aturan untuk posisi header yang tetap di atas setiap halaman */
            header {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                width: 100%;
                text-align: center;
                font-size: 20px;
                margin-bottom: 10mm;
                background-color: white;
                padding: 10px 0;
                z-index: 1000;
            }

            /* Memberikan margin pada konten utama agar tidak tertutup header yang tetap */
            .content {
                margin-top: 120px; /* Sesuaikan dengan tinggi header */
            }

            @page {
                size: A4;
                margin-top: 120px; /* Memberikan ruang di atas untuk header */
                margin-bottom: 20mm;
            }

            /* Menambahkan aturan agar header tetap muncul di setiap halaman */
            .page-break {
                page-break-before: always;
            }

            body {
                margin-top: 120px; /* Pastikan konten utama tidak tertutup */
            }
        }
    </style>
</head>

<body>
    <!-- Header yang akan tetap di bagian atas setiap halaman -->
    <header>
        <h1>DAFTAR MAHASISWA KELAS INTERNASIONAL<br>UNIVERSITAS HASANUDDIN</h1>
    </header>

    <!-- Konten Utama -->
    <div class="content">
        @foreach ($programsData as $index => $programData)
            <!-- Page Break sebelum setiap program studi baru -->
            @if ($index > 0)
                <div class="page-break"></div>
            @endif

            <div>
                <h3><span>Program Studi :</span> {{ $programData['studyProgram']->study_program_Name }}</h3>
                @foreach ($programData['groupedByYear'] as $year => $usersByYear)
                    <h3><span>Angkatan :</span> {{ $year }}</h3>
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
            </div>
        @endforeach
    </div>
</body>
</html>
