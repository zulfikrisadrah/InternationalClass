<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h2 class="text-2xl font-bold mb-6">Study Program Details</h2>

                <!-- Display study program data -->
                <div class="mb-8">
                    <h3 class="text-xl font-bold">{{ $studyProgram->study_program_Name }}</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p><strong>Degree:</strong> {{ $studyProgram->degree }}</p>
                            <p><strong>Faculty:</strong> {{ $studyProgram->faculty->Faculty_Name }}</p>
                            <p><strong>Accreditation:</strong></p>
                            <ul class="list-disc list-inside ml-4">
                                <li>National: {{ $studyProgram->national_accreditation }}</li>
                                <li>International: {{ $studyProgram->international_accreditation }}</li>
                            </ul>
                            <p><strong>Opening Year:</strong> {{ $studyProgram->opening_year }}</p>
                            <p><strong>Program Management:</strong></p>
                            <ul class="list-disc list-inside ml-4">
                                <li>Director: {{ $studyProgram->director_name }}</li>
                                <li>Contact: {{ $studyProgram->director_contact }}</li>
                            </ul>
                        </div>
                        <div>
                            <p><strong>Academic Environment:</strong></p>
                            <ul class="list-disc list-inside ml-4">
                                <li>Classrooms: {{ $studyProgram->classrooms }}</li>
                                <li>Lecturers: {{ $studyProgram->lecturers }}</li>
                            </ul>
                            <p><strong>Tuition Fees:</strong></p>
                            <ul class="list-disc list-inside ml-4">
                                <li>UKT: IDR {{ number_format($studyProgram->ukt_fee, 2, ',', '.') }}</li>
                                <li>IPI: IDR {{ number_format($studyProgram->ipi_fee, 2, ',', '.') }}</li>
                            </ul>
                            <p><strong>International Exposure:</strong> {{ $studyProgram->international_exposure }}</p>
                        </div>
                    </div>
                    <p class="mt-4"><strong>Description:</strong></p>
                    <p>{{ $studyProgram->study_program_Description }}</p>
                </div>

                <!-- Partnership section -->
                <div class="mb-8">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold">Partnerships</h3>
                        <label for="add-partnership-modal" class="btn btn-primary modal-button">Add Partnership</label>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">MOU/MOA/IA Number</th>
                                <th class="px-4 py-2">Title of Cooperation</th>
                                <th class="px-4 py-2">Validity Period</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studyProgram->partnerships as $partnership)
                            <tr>
                                <td class="border px-4 py-2">{{ $partnership->mou_moa_ia_number }}</td>
                                <td class="border px-4 py-2">{{ $partnership->title_of_cooperation }}</td>
                                <td class="border px-4 py-2">{{ $partnership->validity_period }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Outbound Lecturer section -->
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-xl font-bold">Outbound Lecturers</h3>
                        <label for="add-outbound-lecturer-modal" class="btn btn-primary modal-button">Add Outbound Lecturer</label>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Lecturer Name</th>
                                <th class="px-4 py-2">Gender</th>
                                <th class="px-4 py-2">Role in KI</th>
                                <th class="px-4 py-2">University Name</th>
                                <th class="px-4 py-2">Activity Year</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($studyProgram->outboundLecturers as $outboundLecturer)
                            <tr>
                                <td class="border px-4 py-2">{{ $outboundLecturer->lecturer_name }}</td>
                                <td class="border px-4 py-2">{{ $outboundLecturer->gender }}</td>
                                <td class="border px-4 py-2">{{ $outboundLecturer->role_in_ki }}</td>
                                <td class="border px-4 py-2">{{ $outboundLecturer->university_name }}</td>
                                <td class="border px-4 py-2">{{ $outboundLecturer->activity_year }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Partnership Modal -->
    <input type="checkbox" id="add-partnership-modal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Add Partnership</h3>
            <form action="{{ route('admin.partnerships.store', $studyProgram) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="mou_moa_ia_number" class="block font-medium text-sm text-gray-700">MOU/MOA/IA Number</label>
                    <input type="text" name="mou_moa_ia_number" id="mou_moa_ia_number" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="title_of_cooperation" class="block font-medium text-sm text-gray-700">Title of Cooperation</label>
                    <input type="text" name="title_of_cooperation" id="title_of_cooperation" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="validity_period" class="block font-medium text-sm text-gray-700">Validity Period</label>
                    <input type="text" name="validity_period" id="validity_period" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="modal-action">
                    <label for="add-partnership-modal" class="btn btn-secondary">Cancel</label>
                    <button type="submit" class="btn btn-primary">Add Partnership</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Add Outbound Lecturer Modal -->
    <input type="checkbox" id="add-outbound-lecturer-modal" class="modal-toggle">
    <div class="modal">
        <div class="modal-box">
            <h3 class="font-bold text-lg">Add Outbound Lecturer</h3>
            <form action="{{ route('admin.outboundLecturers.store', $studyProgram) }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="lecturer_name" class="block font-medium text-sm text-gray-700">Lecturer Name</label>
                    <input type="text" name="lecturer_name" id="lecturer_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                    <select name="gender" id="gender" class="form-select rounded-md shadow-sm mt-1 block w-full" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="role_in_ki" class="block font-medium text-sm text-gray-700">Role in KI</label>
                    <input type="text" name="role_in_ki" id="role_in_ki" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="university_name" class="block font-medium text-sm text-gray-700">University Name</label>
                    <input type="text" name="university_name" id="university_name" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="mb-4">
                    <label for="activity_year" class="block font-medium text-sm text-gray-700">Activity Year</label>
                    <input type="number" name="activity_year" id="activity_year" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                </div>
                <div class="modal-action">
                    <label for="add-outbound-lecturer-modal" class="btn btn-secondary">Cancel</label>
                    <button type="submit" class="btn btn-primary">Add Outbound Lecturer</button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>