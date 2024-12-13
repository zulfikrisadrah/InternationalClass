<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between items-center py-4">
            <form method="GET" action="{{ route('admin.program.index') }}" class="flex items-center gap-4">
                <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search programs"
                    class="py-2 px-4 border border-gray-300 rounded-lg focus:ring focus:ring-blue-300">
                <button type="submit" class="bg-blueThird text-white py-2 px-6 rounded-lg">Search</button>
            </form>

            <a href="{{ route('admin.program.create') }}"
                class="font-bold py-3 px-6 bg-blueThird text-white rounded-full">
                Add New
            </a>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <!-- Program List -->
                @forelse ($programs as $program)
                    <div class="item-card border border-gray-300 rounded-lg p-5 mb-6 shadow-md flex flex-col gap-4">
                        <!-- Program Details -->
                        <div class="flex flex-row justify-between items-center">
                            <div class="flex flex-row items-center gap-x-3">
                                @if ($program->program_Image)
                                    <img src="{{ asset('storage/' . $program->program_Image) }}" alt="image"
                                        class="rounded-2xl object-cover w-[120px] h-[90px]">
                                @else
                                    <div
                                        class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center text-gray-500">
                                        No Image
                                    </div>
                                @endif
                                <div class="flex flex-col">
                                    <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[200px]">
                                        {{ $program->program_Name }}</h3>
                                </div>
                            </div>

                            <div class="hidden md:flex flex-col">
                                <p class="text-slate-500 text-sm">Date</p>
                                <h3 class="text-indigo-950 text-xl font-bold">
                                    {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</h3>
                            </div>

                            <div class="flex flex-col items-center text-center w-[50px]">
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

                            <div class="hidden md:flex flex-row items-center gap-x-3">
                                <a href="{{ route('admin.program.show', $program->ID_program) }}"
                                    class="font-bold py-4 px-6 bg-blue-700 text-white rounded-full">
                                    Detail
                                </a>

                                <a href="{{ route('admin.program.edit', $program->ID_program) }}"
                                    class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                    Edit
                                </a>

                                <label for="delete-modal-{{ $program->ID_program }}"
                                    class="cursor-pointer font-bold py-4 px-6 bg-redSecondary text-white rounded-full">
                                    Delete
                                </label>

                                <input type="checkbox" id="delete-modal-{{ $program->ID_program }}"
                                    class="modal-toggle" />
                                <div class="modal">
                                    <div class="modal-box">
                                        <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                        <p class="py-4">Are you sure you want to delete this program? This action
                                            cannot be undone.</p>
                                        <div class="modal-action">
                                            <label for="delete-modal-{{ $program->ID_program }}"
                                                class="btn">Cancel</label>
                                            <!-- Program deletion form -->
                                            <form action="{{ route('admin.program.destroy', $program->ID_program) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-error text-white">Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Enrollment Verification Section -->
                        @php
                            $pendingStudents = $program->students->filter(function ($student) {
                                return $student->pivot->status === 'pending';
                            });
                            $isScrollable = $pendingStudents->count() > 5; // Check if there are more than 5 pending students
                        @endphp

                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4 mt-5 border-t border-gray-300">
                            <h3 class="text-xl font-bold text-gray-800 mb-4">Enrollment Verification</h3>

                            @if (!$pendingStudents->isEmpty())
                                <div class="overflow-y-auto" style="{{ $isScrollable ? 'max-height: 300px;' : '' }}">
                                    <table class="min-w-full table-auto border-collapse">
                                        <thead class="bg-gray-100">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b border-gray-300">
                                                    Student Name</th>
                                                <th
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b border-gray-300">
                                                    Status</th>
                                                <th
                                                    class="px-6 py-3 text-left text-sm font-medium text-gray-500 border-b border-gray-300">
                                                    Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($pendingStudents as $student)
                                                <tr class="border-b border-gray-300">
                                                    <td class="px-6 py-4 text-sm text-gray-900">
                                                        {{ $student->Student_Name }}</td>
                                                    <td class="px-6 py-4 text-sm text-gray-500">
                                                        {{ $student->pivot->status ?? 'Pending' }}
                                                    </td>
                                                    <td class="px-6 py-4 text-sm">
                                                        <form
                                                            action="{{ route('admin.program.updateStatus', ['programId' => $program->ID_program, 'studentId' => $student->ID_Student]) }}"
                                                            method="POST" class="inline-block">
                                                            @csrf
                                                            <input type="hidden" name="status" value="approved">
                                                            <button type="submit"
                                                                class="font-bold text-green-500">Accept</button>
                                                        </form>
                                                        <form
                                                            action="{{ route('admin.program.updateStatus', ['programId' => $program->ID_program, 'studentId' => $student->ID_Student]) }}"
                                                            method="POST" class="inline-block ml-3">
                                                            @csrf
                                                            <input type="hidden" name="status" value="rejected">
                                                            <button type="submit"
                                                                class="font-bold text-red-500">Reject</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <p class="text-gray-500 text-center py-6">No students pending for verification.</p>
                            @endif
                        </div>
                    </div>
                @empty
                    <p class="text-center text-lg font-bold text-black">No Programs Available</p>
                @endforelse

                <!-- Pagination -->
                @if ($programs->count() >= 5)
                    <div class="mt-6">
                        {{ $programs->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
