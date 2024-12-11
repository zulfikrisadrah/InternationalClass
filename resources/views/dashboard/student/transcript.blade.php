<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="container mx-auto p-4">
        {{-- <h1 class="text-2xl font-semibold mb-4">Student Transcript</h1> --}}

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-bold mb-2">Transcript Detail</h2>
            @if(!empty($processedTranscripts))
                <table class="min-w-full table-fixed border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-4">No</th>
                            <th class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-20">Code</th>
                            <th class="border px-4 py-2 font-bold text-left bg-blueThird text-white w-60">Subject</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-10">SKS</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-10">Letter Grade</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-10">Numeric Grade</th>
                            <th class="border px-4 py-2 font-bold text-center bg-blueThird text-white w-10">Total Grade</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($processedTranscripts as $index => $transcript)
                            <tr>
                                <td class="border px-4 py-2 text-center">{{ $index + 1 }}</td>
                                <td class="border px-4 py-2 text-left">{{ $transcript['kode'] }}</td>
                                <td class="border px-4 py-2 text-left break-words">{{ $transcript['mata_kuliah'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $transcript['sks'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $transcript['huruf'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $transcript['angka'] }}</td>
                                <td class="border px-4 py-2 text-center">{{ $transcript['total'] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-red-500 mt-4">Unable to retrieve transcript data. Please try again later.</p>
            @endif
        </div>
    </div>
</x-app-layout>
