<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @include('dashboard.partials.header')
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 space-y-6">

                <!-- Judul Halaman Laporan -->
                <div class="text-center mb-6">
                    <h3 class="text-2xl font-semibold text-gray-800">{{ $program->program_Name }}</h3>
                    <p class="text-lg text-gray-600">
                        {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($program->End_Date)->format('d M Y') }}</p>
                    <p class="text-lg text-gray-600">{{ $user->student->Student_Name }} ({{ $user->student->Student_ID_Number }})</p>
                </div>

                <!-- Tabel Logbook -->
                <div class="overflow-x-auto bg-white shadow-lg rounded-lg p-4">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-blue-100">
                            <tr>
                                <th class="px-4 py-3 text-center text-sm font-medium text-gray-500 border">No</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 border">Activity</th>
                                <th class="px-4 py-3 text-center text-sm font-medium text-gray-500 border">Start Time</th>
                                <th class="px-4 py-3 text-center text-sm font-medium text-gray-500 border">End Time</th>
                                <th class="px-4 py-3 text-center text-sm font-medium text-gray-500 border">Duration (Minutes)</th>
                                <th class="px-4 py-3 text-left text-sm font-medium text-gray-500 border">Description</th>
                                <th class="px-4 py-3 text-center text-sm font-medium text-gray-500 border">Logbook Image</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-50">
                            @php
                                $totalDuration = 0;
                            @endphp
                            @foreach($logbooks as $index => $logbook)
                                @php
                                    $duration = \Carbon\Carbon::parse($logbook->Start_Time)->diffInMinutes(\Carbon\Carbon::parse($logbook->End_Time));
                                    $totalDuration += $duration;
                                @endphp
                                <tr class="border-b hover:bg-gray-100 transition-all duration-200">
                                    <td class="border px-4 py-2 text-sm text-center">{{ $index + 1 }}</td>
                                    <td class="border px-4 py-2 text-sm text-gray-900">{{ $logbook->Logbook_Name }}</td>
                                    <td class="border px-4 py-2 text-sm text-center text-gray-900">{{ \Carbon\Carbon::parse($logbook->Start_Time)->format('Y-m-d H:i') }}</td>
                                    <td class="border px-4 py-2 text-sm text-center text-gray-900">
                                        {{ $logbook->End_Time ? \Carbon\Carbon::parse($logbook->End_Time)->format('Y-m-d H:i') : 'Belum selesai' }}
                                    </td>
                                    <td class="border px-4 py-2 text-sm text-center text-gray-900">{{ $duration }}</td>
                                    <td class="border px-4 py-2 text-sm text-gray-900">{{ $logbook->Logbook_Description }}</td>
                                    <td class="border px-4 py-2 text-sm text-gray-900">
                                        @if($logbook->Logbook_Image)
                                            <img src="{{ asset('storage/' . $logbook->Logbook_Image) }}" alt="Logbook Image" class="w-28 h-20 object-cover rounded-lg mx-auto">
                                        @else
                                            No Image
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                @if($logbooks->isEmpty())
                    <p class="text-center text-lg font-bold text-black">No Logbook Entries Found</p>
                @endif

                <!-- Footer: Total Duration -->
                @if($logbooks->isNotEmpty())
                    <div class="text-left font-bold text-lg mt-4">
                        <p>Total Activity Time: <span class="text-black">{{ $totalDuration }} Minutes</span></p>
                    </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
