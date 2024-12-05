<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <!-- Manage Programs Section -->
    <div class="flex flex-row justify-between items-center py-2">
        <a href="{{ route('admin.program.create') }}"
            class="ml-auto mr-8 font-bold py-4 px-6 bg-blueThird text-white rounded-full">
            Add New
        </a>
    </div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <!-- Program List -->
                @foreach ($programs as $program)
                    <div class="item-card flex flex-row justify-between items-center mb-6">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Program Image -->
                            @if ($program->program_Image)
                                <img src="{{ asset('storage/' . $program->program_Image) }}" alt="image"
                                     class="rounded-2xl object-cover w-[120px] h-[90px]">
                            @else
                                <div class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[200px]">{{ $program->program_Name }}</h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <!-- Button for Modal -->
                            <button onclick="openModal('modal-{{ $program->ID_program }}')" class="font-bold py-4 px-6 bg-blue-700 text-white rounded-full">
                                Detail
                            </button>

                            <a href="{{ route('admin.program.edit', $program->ID_program) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>

                            <form action="{{ route('admin.program.destroy', $program->ID_program) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this program?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>

                    <!-- Enrollment Verification Table -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 mt-5">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">Enrollment Verification</h3>
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Student Name</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Status</th>
                                    <th class="px-6 py-3 text-left text-sm font-medium text-gray-500">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($program->students as $student)
                                    <tr class="border-b">
                                        <td class="px-6 py-4 text-sm text-gray-900">{{ $student->Student_Name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-500">
                                            {{ $student->pivot->status ?? 'Pending' }}
                                        </td>
                                        <td class="px-6 py-4 text-sm">
                                            <!-- Accept and Reject Buttons -->
                                            @if($student->pivot->status === 'pending')
                                                <form action="{{ route('admin.program.updateStatus', ['programId' => $program->ID_program, 'studentId' => $student->ID_Student]) }}" method="POST" class="inline-block">
                                                    @csrf
                                                    <input type="hidden" name="status" value="approved">
                                                    <button type="submit" class="font-bold text-green-500">Accept</button>
                                                </form>
                                                <form action="{{ route('admin.program.updateStatus', ['programId' => $program->ID_program, 'studentId' => $student->ID_Student]) }}" method="POST" class="inline-block ml-3">
                                                    @csrf
                                                    <input type="hidden" name="status" value="rejected">
                                                    <button type="submit" class="font-bold text-red-500">Reject</button>
                                                </form>
                                            @else
                                                <span class="text-gray-400">No Action</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Modal -->
                    <div id="modal-{{ $program->ID_program }}" class="fixed inset-0 bg-gray-800 bg-opacity-50 hidden justify-center items-center z-50">
                        <div class="bg-white p-4 rounded-lg shadow-lg w-full max-w-md">
                            <!-- Modal Header -->
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
                                    <p class="text-gray-800">{{ $program->ieProgram->ie_program_name}}</p>
                                </div>

                                <div>
                                    <p class="text-sm text-gray-500">Study Program:</p>
                                    <p class="text-gray-800">{{ $program->studyProgram->study_program_Name}}</p>
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

<!-- Modal Toggle Script -->
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
