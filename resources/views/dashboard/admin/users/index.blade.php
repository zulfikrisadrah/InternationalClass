<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-between mb-5">
                <!-- Filter Buttons -->
                <div class="flex space-x-4">
                    <!-- All Users Button -->
                    <a href="{{ route('admin.user.index') }}"
                        class="font-bold py-3 px-6
                            {{ !request()->has('role') && !request()->has('status') ? 'bg-blueThird text-white' : 'bg-white text-black' }}
                        rounded-full">
                        All Student
                    </a>

                    <!-- Student Users Button -->
                    <a href="{{ route('admin.user.index', ['role' => 'student']) }}"
                        class="font-bold py-3 px-6
                            {{ request()->get('role') == 'student' && !request()->has('status') ? 'bg-blueThird text-white' : 'bg-white text-black' }}
                        rounded-full">
                        Active Student
                    </a>

                    @role('admin')
                        <a href="{{ route('admin.user.index', ['role' => 'staff']) }}"
                            class="font-bold py-3 px-6
                            {{ request()->get('role') == 'staff' && !request()->has('status') ? 'bg-blueThird text-white' : 'bg-white text-black' }} rounded-full">
                            Staff
                        </a>
                    @endrole
                </div>
                <div class="flex flex-row justify-between items-center">
                    @if (request()->get('role') == 'student' || request()->get('role') == '')
                        <div id="studentModal" class="hidden fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                <h3 class="text-xl font-semibold">Add International Student</h3>
                                <form action="{{ route('admin.user.storeStudent') }}" method="POST">
                                    @csrf
                                    <div class="mt-4">
                                        <input type="text" id="nimInput" name="nim" class="mt-2 p-2 border border-gray-300 w-full" placeholder="Enter NIM" required>
                                    </div>
                                    <div class="mt-4 flex justify-end">
                                        <button id="closeModal" type="button" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Close</button>
                                        <button type="submit" class="bg-blueThird text-white px-4 py-2 rounded-lg ml-2">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <a href="#" id="openModal" class="ml-auto font-bold py-4 px-6 mr-4 bg-blueThird text-white rounded-full">
                            Add Student
                        </a>

                        <script>
                            document.getElementById('openModal').addEventListener('click', function() {
                                document.getElementById('studentModal').classList.remove('hidden');
                            });

                            document.getElementById('closeModal').addEventListener('click', function() {
                                document.getElementById('studentModal').classList.add('hidden');
                            });
                        </script>

                        @if (session('error'))
                        <div id="nimErrorModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 z-50">
                            <div class="bg-white p-6 rounded-lg shadow-lg w-96">
                                <h3 class="text-xl font-semibold text-red-500">Error</h3>
                                <p>{{ session('error') }}</p>
                                <div class="mt-4 flex justify-end">
                                    <button id="closeModalError" class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">Close</button>
                                </div>
                            </div>
                        </div>

                        <script>
                            document.getElementById('nimErrorModal').classList.remove('hidden');
                            document.getElementById('closeModalError').addEventListener('click', function() {
                                document.getElementById('nimErrorModal').classList.add('hidden');
                            });
                        </script>
                        @endif

                        <a href="{{ route('admin.user.index', ['status' => 'waiting']) }}"
                        class="font-bold py-4 px-6
                                {{ request()->get('status') == 'waiting' ? 'bg-blueThird text-white' : 'bg-white text-gray-700' }}
                                rounded-full relative z-10">
                            Waiting List
                            @if ($waitingCount > 0)
                                <span class="absolute top-0 right-0 w-5 h-5 text-xs text-white bg-red-500 rounded-full flex items-center justify-center">
                                    {{ $waitingCount }}
                                </span>
                            @endif
                        </a>
                    @endif

                    @role('admin')
                        @if (request()->get('role') == 'staff')
                            <a href="{{ route('admin.user.create') }}"
                                class="ml-auto font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                                Add Staff
                            </a>
                        @endif
                    @endrole
                </div>
            </div>

            <div class="flex justify-between mb-5">
                <form method="GET" action="{{ route('admin.user.index') }}" class="flex items-center gap-4">
                    <input type="hidden" name="status" value="{{ request()->get('status') }}">
                    <!-- Menambahkan status -->
                    <input type="hidden" name="role" value="{{ request()->get('role') }}">
                    <input type="hidden" name="study_program" value="{{ request()->get('study_program') }}">
                    <input type="hidden" name="year" value="{{ request()->get('year') }}">
                    <input type="hidden" name="studentStatus" value="{{ request()->get('studentStatus') }}">
                    <input type="text" name="search" value="{{ request()->get('search') }}"
                        placeholder="Search users by name or email" class="py-2 px-4 border rounded-lg">

                    <button type="submit" class="bg-blueThird text-white py-2 px-6 rounded-lg">Search</button>
                </form>

                @if (request()->get('role') == 'student' || (request()->get('role') == '' && request()->get('status') != 'waiting'))
                    <form method="GET" action="{{ route('admin.user.index') }}" class="flex items-center gap-4">
                        <input type="hidden" name="role" value="{{ request()->get('role', '') }}">
                        <input type="hidden" name="search" value="{{ request()->get('search') }}">
                        <input type="hidden" name="status" value="{{ request()->get('status') }}">

                        <div class="flex flex-col">
                            <select id="studentStatus" name="studentStatus" class="py-2 px-4 border rounded-lg" required style="width: 150px">
                                <option value="">Status</option>
                                <option value="completed" {{ request()->get('studentStatus') == 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="in_progress" {{ request()->get('studentStatus') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="not_started" {{ request()->get('studentStatus') == 'not_started' ? 'selected' : '' }}>Not Started</option>
                            </select>
                        </div>

                        @role('admin')
                            <div class="flex flex-col">
                                <select id="study_program" name="study_program" class="py-2 px-4 border rounded-lg"
                                    required>
                                    <option value="">Study Program</option>
                                    @foreach ($studyPrograms as $program)
                                        <option value="{{ $program->ID_study_program }}"
                                            {{ request()->get('study_program') == $program->ID_study_program ? 'selected' : '' }}>
                                            {{ $program->study_program_Name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endrole
                        <div class="flex flex-col">
                            <select id="year" name="year" class="py-2 px-4 border rounded-lg" required
                                style="padding-right: 40px">
                                <option value="">Year</option>
                                @foreach ($years as $year)
                                    <option value="{{ $year }}"
                                        {{ request('year') == $year ? 'selected' : '' }}>
                                        {{ $year }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                @endif
            </div>

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
                $(document).ready(function() {
                    $('#study_program').on('change', function() {
                        var studyProgramId = $(this).val();
                        $(this).closest('form').submit();
                    });

                    $('#year').on('change', function() {
                        var year = $(this).val();
                        $(this).closest('form').submit();
                    });
                    $('#studentStatus').on('change', function() {
                        var year = $(this).val();
                        $(this).closest('form').submit();
                    });
                });
            </script>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @if ($users->isEmpty())
                    <div class="text-center py-6">
                        @if (request()->get('role') == 'student' && !request()->has('status'))
                            <p class="text-lg font-bold text-black">No Active Students Available</p>
                        @elseif(request()->get('role') == 'staff')
                            <p class="text-lg font-bold text-black">No Staff Available</p>
                        @else
                            <p class="text-lg font-bold text-black">No Students Available</p>
                        @endif
                    </div>
                @else
                    <!-- Display Users -->
                    <div class="flex flex-col gap-y-5">
                        @foreach ($users as $user)
                            <div class="item-card flex flex-row justify-between items-center">
                                <div class="flex flex-row items-center gap-x-3 cursor-pointer"
                                    onclick="openModal('{{ $user->id }}')">
                                    <!-- User Info -->
                                    <div class="flex flex-col">
                                        <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[500px]">
                                            {{ $user->name }}
                                        </h3>
                                        <p class="text-black text-sm">{{ $user->email }}</p>

                                        @if (
                                            ($user->hasRole('student') && $user->student && $user->student->studyProgram) ||
                                                ($user->hasRole('staff') && $user->staff && $user->staff->studyProgram))
                                            <p class="text-gray-800 text-sm font-bold pt-2">
                                                {{ $user->hasRole('student') ? $user->student->studyProgram->study_program_Name : $user->staff->studyProgram->study_program_Name }}
                                            </p>

                                            @if (request()->get('role') == 'student' || request()->get('role') == '' && request()->get('status') != 'waiting')
                                                @php
                                                    $programs = $user->student?->programs ?? collect();

                                                    $completedProgram = $programs->firstWhere(function($program) {
                                                        return $program->pivot->status === 'approved' && $program->pivot->isFinished === 1;
                                                    });
                                                @endphp

                                                @if ($completedProgram)
                                                    <div class="text-white text-sm font-bold px-4 py-2 rounded-lg mt-2 inline-block bg-green-500" style="width: 140px; display: flex; align-items: center; justify-content: center;">
                                                        <p class="text-center">COMPLETED</p>
                                                    </div>
                                                @else
                                                    @php
                                                        $inProgressProgram = $programs->firstWhere(function($program) {
                                                            return $program->pivot->status === 'approved' && $program->pivot->isFinished === 0;
                                                        });
                                                    @endphp

                                                    @if ($inProgressProgram)
                                                        <div class="text-white text-sm font-bold px-4 py-2 rounded-lg mt-2 inline-block bg-orange-500" style="width: 140px; display: flex; align-items: center; justify-content: center;">
                                                            <p class="text-center">IN PROGRESS</p>
                                                        </div>
                                                    @else
                                                        @if ($programs->isEmpty() || $programs->where('pivot.status', 'pending')->isNotEmpty())
                                                            <div class="text-white text-sm font-bold px-4 py-2 rounded-lg mt-2 inline-block bg-red-500" style="width: 140px; display: flex; align-items: center; justify-content: center;">
                                                                <p class="text-center">NOT STARTED</p>
                                                            </div>
                                                        @endif
                                                    @endif
                                                @endif
                                            @endif
                                        @elseif(isset($programNames[$user->id]))
                                            <p class="text-gray-800 text-sm font-bold" style="padding-top: 10px">
                                                {{ $programNames[$user->id] }}
                                            </p>
                                        @else
                                            <p class="text-black text-sm font-bold" style="padding-top: 10px">Undefined
                                            </p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Modal -->
                                <!-- Modal -->
                                @if (request()->get('role') == 'student' || request()->get('role') == '' && request()->get('status') != 'waiting')
                                    <div class="modal" id="user-modal-{{ $user->id }}">
                                        <div class="modal-box max-w-3xl p-6 rounded-lg shadow-lg bg-white relative">
                                        <!-- Modal Header -->
                                            <div class="flex justify-between items-center bg-indigo-600 rounded-t-lg px-6 py-4">
                                                <h3 class="text-2xl font-bold text-white flex items-center">
                                                    <!-- Icon Profile -->
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-2" fill="currentColor" viewBox="0 0 24 24">
                                                        <path d="M12 2a7 7 0 017 7 7 7 0 01-14 0 7 7 0 017-7zm0 12c3.866 0 7 3.134 7 7v1H5v-1c0-3.866 3.134-7 7-7z"/>
                                                    </svg>
                                                    User Details
                                                </h3>
                                            </div>
                                            <!-- User Table -->
                                            <div class="overflow-x-auto">
                                                <table class="table-auto w-full border-collapse border border-gray-200 mt-4">
                                                    <thead>
                                                        <tr class="bg-gray-300">
                                                            <th class="py-3 px-4 text-left text-gray-700 font-semibold border-b">Attribute</th>
                                                            <th class="py-3 px-4 text-left text-gray-700 font-semibold border-b">Details</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Name</td>
                                                            <td class="py-3 px-4">{{ $user->name }}</td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">NIM</td>
                                                            <td class="py-3 px-4">{{ $user->username }}</td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Study Program</td>
                                                            <td class="py-3 px-4">
                                                                @if ($user->hasRole('student') && $user->student && $user->student->studyProgram)
                                                                    {{ $user->student->studyProgram->study_program_Name }}
                                                                @elseif ($user->hasRole('staff') && $user->staff && $user->staff->studyProgram)
                                                                    {{ $user->staff->studyProgram->study_program_Name }}
                                                                @else
                                                                    Undefined
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Phone Number</td>
                                                            <td class="py-3 px-4">{{ $user->student->Phone_Number ?? '-'}}</td>
                                                        </tr><tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Gender</td>
                                                            <td class="py-3 px-4">
                                                                {{ $user->student->Gender == 'L' ? 'Male' : ($user->student->Gender == 'P' ? 'Female' : 'N/A') }}
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Program Name</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        <div class="py-2">
                                                                            <a href="{{ route('admin.program.show', $program->ID_program) }}"
                                                                                class="text-white text-sm px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 transition duration-200">
                                                                                {{ $program->program_Name }}
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">IE Program</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        {{ $program->ieProgram->ie_program_name ?? 'Nama program tidak ditemukan' }}
                                                                        @if(!$loop->last), @endif
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Program Date</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        <div>
                                                                            {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d F Y') }} -
                                                                            {{ \Carbon\Carbon::parse($program->End_Date)->format('d F Y') }}
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Status</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        @php
                                                                            $status = $program->pivot->status ?? null;
                                                                            $isFinished = $program->pivot->isFinished ?? false;
                                                                            $statusLabel = $status === 'pending' ? 'Waiting for Approval' : ($isFinished ? 'Completed' : 'In Progress');
                                                                            $statusColor = $status === 'pending' ? 'bg-orange-500' : ($isFinished ? 'bg-green-500' : 'bg-red-500');
                                                                        @endphp
                                                                        <div>
                                                                            <span class="inline-block px-4 py-2 my-1 text-sm rounded-lg text-white {{ $statusColor }}">
                                                                                {{ $statusLabel }}
                                                                            </span>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Logbook</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        <div class="py-2">
                                                                            <a href="{{ route('admin.admin.logbook.index', ['program' => $program->ID_program, 'user' => $user->id]) }}"
                                                                                class="text-white text-sm px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 transition duration-200">
                                                                                Read Logbook ({{ $program->program_Name }})
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">Certificate</td>
                                                            <td class="py-3 px-4">
                                                                @if (isset($user->student) && $user->student->programs->isNotEmpty())
                                                                    @foreach ($user->student->programs as $program)
                                                                        <div class="py-2">
                                                                            <a href="{{ route('admin.certificate.read',  ['program' => $program->ID_program, 'user' => $user->id]) }}"
                                                                                class="text-white text-sm px-4 py-2 rounded-lg bg-blue-500 hover:bg-blue-600 transition duration-200">
                                                                                Read Certificate
                                                                            </a>
                                                                        </div>
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                        <tr class="hover:bg-gray-50 border-b border-t">
                                                            <td class="py-3 px-4 text-gray-600 font-medium">English Score</td>
                                                            <td class="py-3 px-4">
                                                                <form action="{{ route('admin.user.updateEnglishScore', ['userId' => $user->id]) }}" method="POST" id="update-score-form-{{ $user->id }}">
                                                                    @csrf
                                                                    <input type="number" name="English_Score" id="english-score-{{ $user->id }}"
                                                                        value="{{ $user->student->English_Score }}"
                                                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg"
                                                                        min="0" max="100"
                                                                        disabled
                                                                    />
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <!-- Modal Footer -->
                                            <div class="flex justify-end mt-4">
                                                <button id="edit-btn-{{ $user->id }}"
                                                        onclick="toggleEditSave({{ $user->id }})"
                                                        class="mr-2 bg-blue-500 text-white px-4 py-2 rounded-lg">
                                                    Edit
                                                </button>

                                                <button type="submit"
                                                        class="mr-2 bg-blue-500 text-white px-4 py-2 rounded-lg"
                                                        style="display: none;"
                                                        id="save-btn-{{ $user->id }}"
                                                        form="update-score-form-{{ $user->id }}">
                                                    Save
                                                </button>

                                                <button onclick="closeModal('{{ $user->id }}')"
                                                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 transition duration-200">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <script>
                                    function openModal(userId) {
                                        document.getElementById('user-modal-' + userId).classList.add('modal-open');
                                    }

                                    function closeModal(userId) {
                                        document.getElementById('user-modal-' + userId).classList.remove('modal-open');
                                    }

                                    function toggleEditSave(userId) {
                                        const englishScoreInput = document.getElementById('english-score-' + userId);
                                        const editButton = document.getElementById('edit-btn-' + userId);
                                        const saveButton = document.getElementById('save-btn-' + userId);

                                        if (englishScoreInput.disabled) {
                                            englishScoreInput.disabled = false;
                                            editButton.style.display = 'none';
                                            saveButton.style.display = 'inline-block';
                                        } else {
                                            englishScoreInput.disabled = true;
                                            editButton.style.display = 'inline-block';
                                            saveButton.style.display = 'none';
                                        }
                                    }
                                </script>


                                <!-- Action Buttons -->
                                <div class="hidden md:flex flex-row items-center gap-x-3">
                                    @if (request()->get('status') == 'waiting')
                                        <!-- Accept Button & Modal -->
                                        <label for="accept-modal-{{ $user->id }}"
                                            class="font-bold py-4 px-6 bg-green-500 text-white rounded-3xl cursor-pointer">
                                            Accept
                                        </label>
                                        <input type="checkbox" id="accept-modal-{{ $user->id }}"
                                            class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Confirm Acceptance</h3>
                                                <p class="py-4">Are you sure you want to accept this student?</p>
                                                <div class="modal-action">
                                                    <label for="accept-modal-{{ $user->id }}"
                                                        class="btn">Cancel</label>
                                                    <form action="{{ route('admin.user.update', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="action" value="accept">
                                                        <button type="submit"
                                                            class="btn btn-success text-white">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Reject Button & Modal -->
                                        <label for="reject-modal-{{ $user->id }}"
                                            class="font-bold py-4 px-6 bg-redPrimary text-white rounded-3xl cursor-pointer">
                                            Reject
                                        </label>
                                        <input type="checkbox" id="reject-modal-{{ $user->id }}"
                                            class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Confirm Rejection</h3>
                                                <p class="py-4">Are you sure you want to reject this student?</p>
                                                <div class="modal-action">
                                                    <label for="reject-modal-{{ $user->id }}"
                                                        class="btn">Cancel</label>
                                                    <form action="{{ route('admin.user.update', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('PATCH')
                                                        <input type="hidden" name="action" value="reject">
                                                        <button type="submit"
                                                            class="btn btn-error text-white">Yes</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @elseif(request()->get('role') == 'staff')
                                        <!-- Delete Button & Modal -->
                                        <label for="delete-modal-{{ $user->id }}"
                                            class="cursor-pointer font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                            Delete
                                        </label>
                                        <input type="checkbox" id="delete-modal-{{ $user->id }}"
                                            class="modal-toggle" />
                                        <div class="modal">
                                            <div class="modal-box">
                                                <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                                <p class="py-4">Are you sure you want to delete this user? This
                                                    action
                                                    cannot be undone.</p>
                                                <div class="modal-action">
                                                    <label for="delete-modal-{{ $user->id }}"
                                                        class="btn">Cancel</label>
                                                    <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-error text-white">Delete</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @else
                                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit"
                                                class="py-4 px-6 text-white rounded-3xl {{ $user->student->isActive ? 'bg-green-500' : 'bg-red-500' }} font-semibold focus:outline-none"
                                                name="isActive" value="{{ $user->student->isActive ? 0 : 1 }}">
                                                {{ $user->student->isActive ? 'Active' : 'Inactive' }}
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <label for="delete-modal-{{ $user->id }}"
                                                class="cursor-pointer font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                                Delete
                                            </label>
                                            <input type="checkbox" id="delete-modal-{{ $user->id }}"
                                                class="modal-toggle" />
                                            <div class="modal">
                                                <div class="modal-box">
                                                    <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                                    <p class="py-4">Are you sure you want to delete this
                                                        user?
                                                        This action cannot be undone.</p>
                                                    <div class="modal-action">
                                                        <label for="delete-modal-{{ $user->id }}"
                                                            class="btn">Cancel</label>
                                                        <form action="{{ route('admin.user.destroy', $user->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="btn btn-error text-white">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    @if ($users->lastPage() > 1)
                        <div class="mt-6">
                            {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                @endif
            </div>
            <div class="flex justify-end mb-4">
                <div class="flex justify-end mb-4">
                    @if (!request()->filled('status') && request()->query('role') != 'staff')
                        <a href="{{ route('admin.user.preview-pdf', request()->query()) }}" target="_blank"
                            class="mt-5 bg-blue-500 text-white py-2 px-4 mr-2 rounded-lg flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" class="w-5 h-5 mr-2">
                                <path d="M16 2H6C4.9 2 4 2.9 4 4V20C4 21.1 4.9 22 6 22H16C17.1 22 18 21.1 18 20V4C18 2.9 17.1 2 16 2ZM16 20H6V4H16V20Z" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                <path d="M9 6H15M9 10H15M9 14H15M9 18H15" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                                <circle cx="18" cy="6" r="2" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></circle>
                            </svg>
                            Preview PDF
                        </a>

                        <a href="{{ route('admin.user.generate-pdf', request()->query()) }}" target="_blank"
                            class="flex items-center space-x-2 mt-5 bg-redThird text-white py-2 px-4 rounded-lg ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20"
                                fill="none" stroke="currentColor" class="w-5 h-5">
                                <path
                                    d="M14 4V2H6v2H4a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V6a2 2 0 0 0-2-2h-2zm-1 0H7V3h6v1zM4 6h12v8H4V6z"
                                    stroke-linecap="round" stroke-linejoin="round" stroke-width="2"></path>
                            </svg>
                            <span>Print PDF</span>
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
