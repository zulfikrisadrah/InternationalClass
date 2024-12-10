<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <!-- Display alert if there is a status message -->
    @if (session('success'))
        <div class="alert alert-success bg-green-200 text-green-800 p-4 rounded-lg mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-error bg-red-200 text-red-800 p-4 rounded-lg mb-4">
            {{ session('error') }}
        </div>
    @endif

    <!-- Dropdown untuk memilih jenis IE -->
    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('student.program.index') }}">
                <select name="ie_program_id" class="p-2 pr-8 rounded-md border border-gray-300">
                    <option value="">All</option>
                    @foreach ($iePrograms as $ie)
                        <option value="{{ $ie->ID_Ie_program }}" {{ request('ie_program_id') == $ie->ID_Ie_program ? 'selected' : '' }}>
                            {{ $ie->ie_program_name }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="ml-2 p-2 bg-indigo-700 text-white rounded-md">Filter</button>
            </form>
        </div>
    </div>

    <!-- Program List -->
    <div class="py-1">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($programs as $program)
                    <div class="item-card flex flex-row items-center justify-between gap-x-3">
                        <!-- Program Image and Name -->
                        <div class="flex flex-row items-center gap-x-3 flex-grow">
                            @if ($program->program_Image)
                                <img src="{{ asset('storage/' . $program->program_Image) }}" alt="Program Image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            @else
                                <div class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate">{{ $program->program_Name }}</h3>
                                <p class="text-slate-500">{{ $program->Country_of_Execution }} - {{ $program->ieProgram->ie_program_name ?? 'No IE Program Assigned' }}</p>
                            </div>
                        </div>

                        <!-- Execution Date -->
                        <div class="flex flex-col items-center text-center w-[150px]">
                            <p class="text-slate-500 font-semibold">Execution Date</p>
                            <p class="text-indigo-900 font-bold">
                                {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}
                            </p>
                        </div>

                        <!-- Participants Count and Limit -->
                        <div class="flex flex-col items-center text-center w-[300px]">
                            @php
                                $approvedCount = $program->students()->wherePivot('status', 'approved')->count();
                                $participantLimit = $program->Participants_Count;
                            @endphp

                            <p class="text-slate-500 font-semibold">Participants</p>
                            <p class="text-indigo-900 font-bold">
                                @if ($approvedCount >= $participantLimit)
                                    <span class="text-red-600">Full</span>
                                @else
                                    {{ $approvedCount }} / {{ $participantLimit }}
                                @endif
                            </p>
                        </div>

                        <!-- Button Section (Detail and Enroll) -->
                        <div class="flex items-center gap-x-3">
                            <!-- Detail Button -->
                            <button onclick="openModal('modal-{{ $program->ID_program }}')" class="font-bold py-2 px-4 bg-blue-700 text-white rounded-full">
                                Detail
                            </button>
                            <!-- Enroll Button -->
                            <form action="{{ route('student.program.enroll', $program->ID_program) }}" method="POST">
                                @csrf
                                <button type="submit" class="font-bold py-2 px-4 bg-indigo-700 text-white rounded-full">
                                    Enroll
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div id="modal-{{ $program->ID_program }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
                        <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-md">
                            <div class="flex items-center justify-between mb-4 border-b pb-2">
                                <h2 class="text-xl font-bold text-gray-800">Program Details</h2>
                                <button onclick="closeModal('modal-{{ $program->ID_program }}')" class="text-gray-500 hover:text-gray-800 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                            </div>

                            <!-- Modal Content -->
                            <div class="space-y-3">
                                <div>
                                    <p class="text-sm text-gray-500">Program Name:</p>
                                    <h3 class="text-lg font-semibold text-gray-800">{{ $program->program_Name }}</h3>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Program Description:</p>
                                    <p class="text-gray-800">{{ Str::limit(html_entity_decode(strip_tags($program->program_description)), 150, '...') }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Country of Execution:</p>
                                    <p class="text-gray-800">{{ $program->Country_of_Execution }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Execution Date:</p>
                                    <p class="text-gray-800">{{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Participants Count:</p>
                                    <p class="text-gray-800">{{ $program->Participants_Count }}</p>
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

                            <!-- Program Image -->
                            <div class="mt-4 flex justify-center">
                                @if ($program->program_Image)
                                    <img src="{{ asset('storage/' . $program->program_Image) }}" alt="{{ $program->program_Name }}"
                                        class="rounded-lg object-cover mx-auto shadow-md w-full h-40">
                                @else
                                    <div class="w-full h-40 bg-gray-300 rounded-lg flex items-center justify-center text-gray-500">
                                        No Image Available
                                    </div>
                                @endif
                            </div>

                            <!-- Modal Footer -->
                            <div class="flex justify-end mt-4">
                                <button onclick="closeModal('modal-{{ $program->ID_program }}')" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-700 transition">
                                    Close
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    function openModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    }

    function closeModal(modalId) {
        const modal = document.getElementById(modalId);
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
</script>
