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

                @role('admin')
                    <div class="flex flex-row justify-between items-center">
                        <a href="{{ route('admin.user.create') }}"
                            class="ml-auto font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                            Add Staff
                        </a>
                    </div>
                @endrole
            </div>

            <div class="flex justify-between mb-5">
                <form method="GET" action="{{ route('admin.user.index') }}" class="flex items-center gap-4">
                    <input type="hidden" name="status" value="{{ request()->get('status') }}"> <!-- Menambahkan status -->
                    <input type="hidden" name="role" value="{{ request()->get('role') }}">
                    
                    <input type="text" name="search" value="{{ request()->get('search') }}" placeholder="Search users by name or email" class="py-2 px-4 border rounded-lg">
                    
                    <button type="submit" class="bg-blueThird text-white py-2 px-6 rounded-lg">Search</button>
                </form>                

                <!-- Waiting List Button -->
                <div class="flex flex-row justify-between items-center">
                    @if (request()->get('role') == 'student' || !request()->has('role'))
                        <a href="{{ route('admin.user.index', ['status' => 'waiting']) }}"
                            class="font-bold py-4 px-6
                                {{ request()->get('status') == 'waiting' ? 'bg-blueThird text-white' : 'bg-white text-gray-700' }}
                            rounded-full relative">
                            Waiting List
                            @if ($waitingCount > 0)
                                <span
                                    class="absolute top-0 right-0 w-5 h-5 text-xs text-white bg-red-500 rounded-full flex items-center justify-center">
                                    {{ $waitingCount }}
                                </span>
                            @endif
                        </a>
                    @endif
                </div>
            </div>
            
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
                                <div class="flex flex-row items-center gap-x-3">
                                    <!-- User Info -->
                                    <div class="flex flex-col">
                                        <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[500px]">
                                            {{ $user->name }}</h3>
                                        <p class="text-black text-sm">{{ $user->email }}</p>

                                        @if (
                                            ($user->hasRole('student') && $user->student && $user->student->studyProgram) ||
                                                ($user->hasRole('staff') && $user->staff && $user->staff->studyProgram))
                                            <p class="text-gray-800 text-sm font-bold" style="padding-top: 10px">
                                                {{ $user->hasRole('student') ? $user->student->studyProgram->study_program_Name : $user->staff->studyProgram->study_program_Name }}
                                            </p>
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

                                <!-- Action Buttons -->
                                <div class="hidden md:flex flex-row items-center gap-x-3">
                                    @if (request()->get('status') == 'waiting')
                                        <button
                                            onclick="openModal('{{ route('admin.user.update', $user->id) }}', 'accept')"
                                            class="font-bold py-4 px-6 bg-green-500 text-white rounded-3xl">
                                            Accept
                                        </button>
                                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="action" value="reject">
                                            <button type="submit"
                                                class="font-bold py-4 px-6 bg-redPrimary text-white rounded-3xl">
                                                Reject
                                            </button>
                                        </form>
                                    @elseif(request()->get('role') == 'staff')
                                        <button type="button"
                                            onclick="openDeleteModal('{{ route('admin.user.destroy', $user->id) }}')"
                                            class="font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                            Delete
                                        </button>
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
                                            <button type="submit"
                                                class="font-bold py-4 px-6 bg-redPrimary text-white rounded-full"
                                                onclick="openDeleteModal('{{ route('admin.user.destroy', $user->id) }}')">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-6 ">
                        {{ $users->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
        <div class="">
            <div class="bg-white p-6 rounded-lg max-w-sm w-full">
                <p class="text-lg font-semibold mb-4">Are you sure you want to accept this student?</p>
                <div class="flex justify-between">
                    <button id="cancelButton" class="bg-gray-300 px-4 py-2 rounded-3xl">Cancel</button>
                    <form id="acceptForm" method="POST" action="">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="action" value="accept">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-3xl">Yes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal -->
    <div id="deleteModal" class="fixed inset-0 bg-gray-500 bg-opacity-75 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg max-w-sm w-full">
            <p class="text-lg font-semibold mb-4">Are you sure you want to delete this user?</p>
            <div class="flex justify-between">
                <button id="cancelDeleteButton" class="bg-gray-300 px-4 py-2 rounded-3xl">Cancel</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-redPrimary text-white px-4 py-2 rounded-3xl">Yes</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openModal(actionUrl, actionType) {
            const modal = document.getElementById('confirmModal');
            const form = document.getElementById('acceptForm');
            const cancelButton = document.getElementById('cancelButton');

            form.action = actionUrl;
            modal.classList.remove('hidden');

            cancelButton.onclick = function() {
                modal.classList.add('hidden');
            };
        }

        function openDeleteModal(actionUrl) {
            const modal = document.getElementById('deleteModal');
            const form = document.getElementById('deleteForm');
            const cancelButton = document.getElementById('cancelDeleteButton');

            form.action = actionUrl;
            modal.classList.remove('hidden');

            cancelButton.addEventListener('click', () => {
                modal.classList.add('hidden');
            });
        }
    </script>
</x-app-layout>
