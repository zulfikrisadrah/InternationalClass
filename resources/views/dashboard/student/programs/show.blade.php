<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="py-16 px-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <!-- Program Details -->
                <div class="mb-6">
                    <h1 class="text-3xl font-bold text-indigo-950">{{ $program->program_Name }}</h1>
                    <p class="text-slate-500 text-sm mt-1">Country of Execution: {{ $program->Country_of_Execution }}</p>
                    <p class="text-slate-500 text-sm">Program Duration:
                        {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($program->End_Date)->format('d M Y') }}
                    </p>
                    <p class="text-slate-500 text-sm">Course Credits: <span class="font-bold">{{ $program->Course_Credits }} SKS</span></p>
                </div>

                <!-- Program Image -->
                <div class="mb-6">
                    @if ($program->program_Image)
                        <img src="{{ asset('storage/' . $program->program_Image) }}" alt="{{ $program->program_Name }}"
                             class="w-full h-80 object-cover rounded-lg shadow-md">
                    @else
                        <div class="w-full h-80 bg-gray-300 rounded-lg flex items-center justify-center text-gray-500">
                            No Image Available
                        </div>
                    @endif
                </div>

                <!-- Description -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-indigo-950">Description</h2>
                    <p class="text-gray-700 mt-2 break-words">
                        {!! nl2br(html_entity_decode($program->program_description)) !!}
                    </p>
                </div>

                <!-- IE Program Details -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-indigo-950">International Exposure Program</h2>
                    <p class="text-gray-700 mt-2">{{ $program->ieProgram->ie_program_name ?? 'No IE Program Assigned' }}</p>
                </div>

                <!-- Study Program Details -->
                <div class="mb-6">
                    <h2 class="text-xl font-bold text-indigo-950">Study Program</h2>
                    @if ($program->studyProgram->isNotEmpty())
                        @foreach ($program->studyProgram as $studyProgram)
                            <span>{{ $studyProgram->study_program_Name }}</span>
                            @if (!$loop->last), @endif
                        @endforeach
                    @else
                        No study program associated.
                    @endif
                </div>

                <!-- Participants Details -->
                <div class="mb-6">
                    @php
                        $approvedCount = $program->students()->wherePivot('status', 'approved')->count();
                        $participantLimit = $program->Participants_Count;
                    @endphp
                    <h2 class="text-xl font-bold text-indigo-950">Participants</h2>
                    <p class="text-gray-700 mt-2">
                        @if ($approvedCount >= $participantLimit)
                            <span class="text-red-600">Full</span>
                        @else
                            {{ $approvedCount }} / {{ $participantLimit }}
                        @endif
                    </p>
                </div>

                <!-- Enroll Button -->
                <div class="mt-6 flex justify-end">
                    @php
                        $student = auth()->user()->student;
                        $existingEnrollment = $student->programs()->where('program_enrollment.ID_program', $program->ID_program)->first();
                        $currentStatus = $existingEnrollment ? $existingEnrollment->pivot->status : null;
                    @endphp
                    @if ($currentStatus === 'approved')
                        <!-- Logbook Button -->
                        <a href="{{ route('student.logbook.index', $program->ID_program) }}" class="font-bold py-2 px-4 bg-green-700 text-white rounded-full">
                            Logbook
                        </a>
                    @else
                        <button type="button" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full" onclick="openModal()">
                            Enroll in Program
                        </button>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="enrollModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-black opacity-50 absolute inset-0" onclick="closeModal()"></div>
        <div class="bg-white rounded-lg shadow-lg p-6 relative z-10 w-96">
            <h2 class="text-xl font-bold text-indigo-950 mb-4">Confirm Enrollment</h2>
            <p class="text-gray-700 mb-6">Are you sure you want to enroll in this program?</p>
            <div class="flex justify-between">
                <button class="py-2 px-4 bg-gray-300 text-gray-700 rounded-full" onclick="closeModal()">Cancel</button>
                <form action="{{ route('student.program.enroll', $program->ID_program) }}" method="POST" id="enrollForm">
                    @csrf
                    <button type="submit" class="py-2 px-4 bg-indigo-700 text-white rounded-full">
                        Confirm Enrollment
                    </button>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Open the modal
        function openModal() {
            document.getElementById('enrollModal').classList.remove('hidden');
        }

        // Close the modal
        function closeModal() {
            document.getElementById('enrollModal').classList.add('hidden');
        }
    </script>

</x-app-layout>
