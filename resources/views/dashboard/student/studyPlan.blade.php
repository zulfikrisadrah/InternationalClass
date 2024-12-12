<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">

        <!-- Menampilkan Pesan Sukses -->
        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded-lg mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan Pesan Error -->
        @if(session('error'))
            <div class="bg-red-500 text-white p-4 rounded-lg mb-4">
                {{ session('error') }}
            </div>
        @endif

        <!-- Dropdown Semester -->
        <div class="mb-4">
            <label for="semester" class="mr-2 font-semibold">Semester :</label>
            <select id="semester" class="border px-4 py-2 rounded" style="width: 100px;">
                @foreach($semesters as $availableSemester)
                    <option value="{{ $availableSemester }}" {{ $availableSemester == request('semester') ? 'selected' : '' }}>
                        {{ $availableSemester }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Menampilkan daftar mata kuliah dan SKS berdasarkan semester yang dipilih -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-2">Enrolled Subjects</h2>
            <div id="mataKuliahTable">
                <!-- Data ini akan diganti melalui AJAX -->
                @if(!empty($mataKuliahData))
                    <table class="min-w-full table-fixed border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <td class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-4">No</td>
                                <td class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-15">Subject</td>
                                <td class="border px-4 py-2 font-bold text-center bg-blueThird text-white">SKS</td>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($mataKuliahData as $index => $mataKuliah)
                                <tr>
                                    <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2 break-words">{{ $mataKuliah['nama_mata_kuliah'] }}</td>
                                    <td class="border px-4 py-2 text-center">{{ $mataKuliah['jumlah_sks'] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td class="border px-4 py-2 font-bold text-left bg-blueThird text-white" colspan="2">TOTAL SKS</td>
                                <td class="border px-4 py-2 font-bold text-center bg-blueThird text-white">
                                    @php
                                        $totalSks = array_sum(array_column($mataKuliahData, 'jumlah_sks'));
                                    @endphp
                                    {{ $totalSks }}
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                @else
                    <p class="text-red-500">Failed to retrieve Enrolled Subjects data. Please try again later.</p>
                @endif
            </div>
        </div>
    </div>

    <script>
        document.getElementById('semester').addEventListener('change', function() {
            var semester = this.value;

            fetch("{{ route('student.studyPlan.index') }}?semester=" + semester, {
                method: 'GET',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('mataKuliahTable').innerHTML = data.mataKuliahTable;
            })
            .catch(error => {
                console.error('Error:', error);
            });
        });
    </script>

</x-app-layout>
