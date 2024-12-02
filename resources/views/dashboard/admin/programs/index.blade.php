<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <!-- Manage Programs Section -->
    <div class="flex flex-row justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Programs') }}
        </h2>
        <a href="{{ route('admin.program.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
            Add New
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                <!-- Program List -->
                @foreach ($programs as $program)
                    <div class="item-card flex flex-row justify-between items-center mb-6">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Program Image -->
                            <img src="{{ asset('storage/' . $program->program_Image) }}" alt="image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[200px]">{{ $program->program_Name }}</h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
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
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
