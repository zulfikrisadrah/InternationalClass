<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Hero Section -->
            <div class="hero bg-base-200 rounded-box mb-6">
                <div class="hero-content text-center">
                    <div class="max-w-2xl">
                        <h1 class="text-3xl font-bold">{{ $studyProgram->study_program_Name }}</h1>
                        <div class="badge badge-primary">{{ $studyProgram->degree }}</div>
                        <div class="badge badge-secondary ml-2">{{ $studyProgram->faculty->Faculty_Name }}</div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Program Details Card -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title text-primary">Program Information</h2>
                        <div class="divider"></div>

                        <div class="space-y-4">
                            <!-- Accreditation Stats -->
                            <div class="stats stats-vertical lg:stats-horizontal shadow">
                                <div class="stat">
                                    <div class="stat-title">National Accreditation</div>
                                    <div class="stat-value text-primary">{{ $studyProgram->national_accreditation }}
                                    </div>
                                </div>
                                <div class="stat">
                                    <div class="stat-title">International Accreditation</div>
                                    <div class="stat-value text-secondary">
                                        {{ $studyProgram->international_accreditation }}</div>
                                </div>
                            </div>

                            <!-- Program Management -->
                            <div class="bg-base-200 p-4 rounded-lg">
                                <h3 class="font-bold mb-2">Program Management</h3>
                                <div class="flex items-center gap-4">
                                    <div>
                                        <p class="font-semibold">{{ $studyProgram->director_name }}</p>
                                        <p class="text-sm opacity-75">{{ $studyProgram->director_contact }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Academic Environment Card -->
                <div class="card bg-base-100 shadow-xl">
                    <div class="card-body">
                        <h2 class="card-title text-secondary">Academic Environment</h2>
                        <div class="divider"></div>

                        <!-- Academic Stats -->
                        <div class="stats shadow">
                            <div class="stat">
                                <div class="stat-figure text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="inline-block w-8 h-8 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="stat-title">Classrooms</div>
                                <div class="stat-value">{{ $studyProgram->classrooms }}</div>
                            </div>
                            <div class="stat">
                                <div class="stat-figure text-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        class="inline-block w-8 h-8 stroke-current">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4">
                                        </path>
                                    </svg>
                                </div>
                                <div class="stat-title">Lecturers</div>
                                <div class="stat-value">{{ $studyProgram->lecturers }}</div>
                            </div>
                        </div>

                        <!-- Tuition Fees -->
                        <div class="mt-6">
                            <h3 class="font-bold mb-4">Tuition Fees</h3>
                            <div class="overflow-x-auto">
                                <table class="table w-full">
                                    <tbody>
                                        <tr>
                                            <td>UKT</td>
                                            <td class="text-right">IDR
                                                {{ number_format($studyProgram->ukt_fee, 2, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td>IPI</td>
                                            <td class="text-right">IDR
                                                {{ number_format($studyProgram->ipi_fee, 2, ',', '.') }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partnerships Section -->
            <div class="card bg-base-100 shadow-xl mt-6">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <h2 class="card-title text-primary">Partnerships</h2>
                        <div>
                            <label for="add-partnership-modal" class="btn btn-primary modal-button">Add
                                Partnership</label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th class="w-1/4">MOU/MOA/IA Number</th>
                                    <th class="w-1/2">Title of Cooperation</th>
                                    <th class="w-1/4">Validity Period</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studyProgram->partnerships as $partnership)
                                    <tr>
                                        <td>{{ $partnership->mou_moa_ia_number }}</td>
                                        <td>{{ $partnership->title_of_cooperation }}</td>
                                        <td>{{ $partnership->validity_period }}</td>
                                        <td class="flex space-x-2">
                                            <label for="edit-partnership-modal-{{ $partnership->id }}"
                                                class="btn btn-sm btn-outline btn-info">Edit</label>
                                            <label for="delete-partnership-modal-{{ $partnership->id }}"
                                                class="btn btn-sm btn-outline btn-error">Delete</label>
                                        </td>

                                    </tr>

                                    <!-- Edit Partnership Modal -->
                                    <input type="checkbox" id="edit-partnership-modal-{{ $partnership->id }}"
                                        class="modal-toggle">
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Edit Partnership</h3>
                                            <form action="{{ route('admin.partnerships.update', $partnership) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="mou_moa_ia_number"
                                                        class="block font-medium text-sm text-gray-700">MOU/MOA/IA
                                                        Number</label>
                                                    <input type="text" name="mou_moa_ia_number"
                                                        id="mou_moa_ia_number"
                                                        value="{{ $partnership->mou_moa_ia_number }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="title_of_cooperation"
                                                        class="block font-medium text-sm text-gray-700">Title of
                                                        Cooperation</label>
                                                    <input type="text" name="title_of_cooperation"
                                                        id="title_of_cooperation"
                                                        value="{{ $partnership->title_of_cooperation }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="validity_period"
                                                        class="block font-medium text-sm text-gray-700">Validity
                                                        Period</label>
                                                    <input type="text" name="validity_period" id="validity_period"
                                                        value="{{ $partnership->validity_period }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="modal-action">
                                                    <label for="edit-partnership-modal-{{ $partnership->id }}"
                                                        class="btn btn-outline btn-secondary">Cancel</label>
                                                    <button type="submit" class="btn btn-primary">Update
                                                        Partnership</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Delete Partnership Modal -->
                                    <input type="checkbox" id="delete-partnership-modal-{{ $partnership->id }}"
                                        class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                            <p class="py-4">Are you sure you want to delete this partnership? This
                                                action cannot be undone.</p>
                                            <div class="modal-action">
                                                <label for="delete-partnership-modal-{{ $partnership->id }}"
                                                    class="btn btn-outline btn-secondary">Cancel</label>
                                                <form action="{{ route('admin.partnerships.destroy', $partnership) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-error">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Outbound Lecturers Section -->
            <div class="card bg-base-100 shadow-xl mt-6">
                <div class="card-body">
                    <div class="flex justify-between items-center">
                        <h2 class="card-title text-secondary">Outbound Lecturers</h2>
                        <div>
                            <label for="add-outbound-lecturer-modal" class="btn btn-primary modal-button">Add
                                Outbound
                                Lecturer</label>
                        </div>
                    </div>
                    <div class="divider"></div>
                    <div class="overflow-x-auto">
                        <table class="table table-zebra w-full">
                            <thead>
                                <tr>
                                    <th class="w-1/6">Lecturer Name</th>
                                    <th class="w-1/6">Gender</th>
                                    <th class="w-1/6">Role in KI</th>
                                    <th class="w-1/4">University Name</th>
                                    <th class="w-1/6">Activity Year</th>
                                    <th class="w-1/6">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studyProgram->outboundLecturers as $outboundLecturer)
                                    <tr>
                                        <td>{{ $outboundLecturer->lecturer_name }}</td>
                                        <td>{{ $outboundLecturer->gender }}</td>
                                        <td>{{ $outboundLecturer->role_in_ki }}</td>
                                        <td>{{ $outboundLecturer->university_name }}</td>
                                        <td>{{ $outboundLecturer->activity_year }}</td>
                                        <td class="flex space-x-2">
                                            <label for="edit-partnership-modal-{{ $partnership->id }}"
                                                class="btn btn-sm btn-outline btn-info">Edit</label>
                                            <label for="delete-partnership-modal-{{ $partnership->id }}"
                                                class="btn btn-sm btn-outline btn-error">Delete</label>
                                        </td>

                                    </tr>

                                    <!-- Edit Outbound Lecturer Modal -->
                                    <input type="checkbox"
                                        id="edit-outbound-lecturer-modal-{{ $outboundLecturer->id }}"
                                        class="modal-toggle">
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Edit Outbound Lecturer</h3>
                                            <form
                                                action="{{ route('admin.outboundLecturers.update', $outboundLecturer) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="mb-4">
                                                    <label for="lecturer_name"
                                                        class="block font-medium text-sm text-gray-700">Lecturer
                                                        Name</label>
                                                    <input type="text" name="lecturer_name" id="lecturer_name"
                                                        value="{{ $outboundLecturer->lecturer_name }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="gender"
                                                        class="block font-medium text-sm text-gray-700">Gender</label>
                                                    <select name="gender" id="gender"
                                                        class="select select-bordered w-full" required>
                                                        <option value="">Select Gender</option>
                                                        <option value="Male"
                                                            {{ $outboundLecturer->gender === 'Male' ? 'selected' : '' }}>
                                                            Male</option>
                                                        <option value="Female"
                                                            {{ $outboundLecturer->gender === 'Female' ? 'selected' : '' }}>
                                                            Female</option>
                                                    </select>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="role_in_ki"
                                                        class="block font-medium text-sm text-gray-700">Role in
                                                        KI</label>
                                                    <input type="text" name="role_in_ki" id="role_in_ki"
                                                        value="{{ $outboundLecturer->role_in_ki }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="university_name"
                                                        class="block font-medium text-sm text-gray-700">University
                                                        Name</label>
                                                    <input type="text" name="university_name" id="university_name"
                                                        value="{{ $outboundLecturer->university_name }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="mb-4">
                                                    <label for="activity_year"
                                                        class="block font-medium text-sm text-gray-700">Activity
                                                        Year</label>
                                                    <input type="number" name="activity_year" id="activity_year"
                                                        value="{{ $outboundLecturer->activity_year }}"
                                                        class="input input-bordered w-full" required>
                                                </div>
                                                <div class="modal-action">
                                                    <label
                                                        for="edit-outbound-lecturer-modal-{{ $outboundLecturer->id }}"
                                                        class="btn btn-outline btn-secondary">Cancel</label>
                                                    <button type="submit" class="btn btn-primary">Update Outbound
                                                        Lecturer</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Delete Outbound Lecturer Modal -->
                                    <input type="checkbox"
                                        id="delete-outbound-lecturer-modal-{{ $outboundLecturer->id }}"
                                        class="modal-toggle" />
                                    <div class="modal">
                                        <div class="modal-box">
                                            <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                            <p class="py-4">Are you sure you want to delete this outbound lecturer?
                                                This action cannot be undone.</p>
                                            <div class="modal-action">
                                                <label
                                                    for="delete-outbound-lecturer-modal-{{ $outboundLecturer->id }}"
                                                    class="btn btn-outline btn-secondary">Cancel</label>
                                                <form
                                                    action="{{ route('admin.outboundLecturers.destroy', $outboundLecturer) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-error">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Add Partnership Modal -->
            <input type="checkbox" id="add-partnership-modal" class="modal-toggle">
            <div class="modal">
                <div class="modal-box">
                    <h3 class="font-bold text-lg">Add Partnership</h3>
                    <form action="{{ route('admin.partnerships.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="mou_moa_ia_number" class="block font-medium text-sm text-gray-700">MOU/MOA/IA
                                Number</label>
                            <input type="text" name="mou_moa_ia_number" id="mou_moa_ia_number"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="title_of_cooperation" class="block font-medium text-sm text-gray-700">Title of
                                Cooperation</label>
                            <input type="text" name="title_of_cooperation" id="title_of_cooperation"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="validity_period" class="block font-medium text-sm text-gray-700">Validity
                                Period</label>
                            <input type="text" name="validity_period" id="validity_period"
                                class="input input-bordered w-full" required>
                        </div>
                        <input type="hidden" name="ID_study_program" value="{{ $studyProgram->ID_study_program }}">
                        <div class="modal-action">
                            <label for="add-partnership-modal" class="btn btn-outline btn-secondary">Cancel</label>
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
                    <form action="{{ route('admin.outboundLecturers.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="lecturer_name" class="block font-medium text-sm text-gray-700">Lecturer
                                Name</label>
                            <input type="text" name="lecturer_name" id="lecturer_name"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="gender" class="block font-medium text-sm text-gray-700">Gender</label>
                            <select name="gender" id="gender" class="select select-bordered w-full" required>
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label for="role_in_ki" class="block font-medium text-sm text-gray-700">Role in KI</label>
                            <input type="text" name="role_in_ki" id="role_in_ki"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="university_name" class="block font-medium text-sm text-gray-700">University
                                Name</label>
                            <input type="text" name="university_name" id="university_name"
                                class="input input-bordered w-full" required>
                        </div>
                        <div class="mb-4">
                            <label for="activity_year" class="block font-medium text-sm text-gray-700">Activity
                                Year</label>
                            <input type="number" name="activity_year" id="activity_year"
                                class="input input-bordered w-full" required>
                        </div>
                        <input type="hidden" name="ID_study_program" value="{{ $studyProgram->ID_study_program }}">
                        <div class="modal-action">
                            <div class="modal-action">
                                <label for="add-outbound-lecturer-modal"
                                    class="btn btn-outline btn-secondary">Cancel</label>
                                <button type="submit" class="btn btn-primary">Add Outbound Lecturer</button>
                            </div>
                    </form>
                </div>
            </div>
</x-app-layout>
