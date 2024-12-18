<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <form method="GET" action="{{ route('admin.studyProgram.index') }}" class="flex items-center gap-4 pt-2">
                <input type="text" name="search" value="{{ request()->get('search') }}"
                    placeholder="Search study programs by name" class="py-2 px-4 border rounded-lg">
                <button type="submit" class="bg-blueThird text-white py-2 px-6 rounded-lg">Search</button>
            </form>

            <a href="{{ route('admin.studyProgram.create') }}"
                class="ml-auto font-bold py-4 px-6 bg-blueThird text-white rounded-3xl">
                Add New
            </a>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($studyPrograms as $program)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Display study program image if available -->
                            @if ($program->study_program_Image)
                                <img src="{{ asset('storage/' . $program->study_program_Image) }}"
                                    alt="Study Program Image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            @else
                                <div
                                    class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-blueSecondary text-xl font-bold truncate max-w-[400px]">
                                    {{ $program->study_program_Name }}
                                </h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.studyProgram.show', $program->ID_study_program) }}"
                                class="font-bold py-4 px-6 bg-blueThird text-white rounded-3xl">
                                Detail
                            </a>
                            <a href="{{ route('admin.studyProgram.edit', $program->ID_study_program) }}"
                                class="font-bold py-4 px-6 bg-blueThird text-white rounded-3xl">
                                Edit
                            </a>

                            <label for="delete-modal-{{ $program->ID_study_program }}"
                                class="cursor-pointer font-bold py-4 px-6 bg-redPrimary text-white rounded-3xl">
                                Delete
                            </label>

                            <input type="checkbox" id="delete-modal-{{ $program->ID_study_program }}"
                                class="modal-toggle" />
                            <div class="modal">
                                <div class="modal-box">
                                    <h3 class="font-bold text-lg">Confirm Deletion</h3>
                                    <p class="py-4">Are you sure you want to delete this study program? This action
                                        cannot
                                        be undone.</p>
                                    <div class="modal-action">
                                        <label for="delete-modal-{{ $program->ID_study_program }}"
                                            class="btn">Cancel</label>
                                        <form
                                            action="{{ route('admin.studyProgram.destroy', $program->ID_study_program) }}"
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
                @empty
                    <p class="text-center text-lg font-bold text-black">No Study Programs Available</p>
                @endforelse
                @if ($studyPrograms->count() >= 10)
                    <div class="mt-6">
                        {{ $studyPrograms->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
