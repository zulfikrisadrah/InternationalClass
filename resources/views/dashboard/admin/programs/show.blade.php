<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Program Details') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 space-y-6">
                <!-- Gambar Program -->
                <div class="flex justify-center">
                    @if ($program->program_Image)
                        <img src="{{ asset('storage/' . $program->program_Image) }}" alt="{{ $program->program_Name }}"
                             class="rounded-lg object-cover shadow-md w-full max-h-96">
                    @else
                        <div class="w-full h-40 bg-gray-300 rounded-lg flex items-center justify-center text-gray-500">
                            No Image Available
                        </div>
                    @endif
                </div>

                <!-- Detail Program -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Program Name:</p>
                        <h3 class="text-lg font-semibold text-gray-800">{{ $program->program_Name }}</h3>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Execution Date:</p>
                        <p class="text-gray-800">{{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Country of Execution:</p>
                        <p class="text-gray-800">{{ $program->Country_of_Execution }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Participants Count:</p>
                        <p class="text-gray-800">{{ $program->Participants_Count }}</p>
                    </div>
                    <div class="md:col-span-2">
                        <p class="text-sm text-gray-500">Program Description:</p>
                        <p class="text-gray-800">{{ Str::limit(html_entity_decode(strip_tags($program->program_description)), 150, '...') }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">IE Program:</p>
                        <p class="text-gray-800">{{ $program->ieProgram->ie_program_name }}</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Study Program:</p>
                        <p class="text-gray-800">{{ $program->studyProgram->study_program_Name }}</p>
                    </div>
                </div>

                <div class="mt-10">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Accepted Students</h3>
                    <table class="min-w-full table-auto border">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border">Student Name</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border">Student ID</th>
                                <th class="px-6 py-3 text-left text-sm font-medium text-gray-500 border">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($acceptedStudents->isEmpty())
                                <tr>
                                    <td colspan="5" class="px-6 py-4 text-center text-sm text-gray-500">
                                        No students have been accepted yet.
                                    </td>
                                </tr>
                            @else
                                @foreach ($acceptedStudents as $student)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $student->Student_Name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $student->Student_ID_Number }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">{{ $student->Student_Email }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                    @if ($acceptedStudents->isNotEmpty())
                        <div class="mt-4">
                            {{ $acceptedStudents->links() }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
