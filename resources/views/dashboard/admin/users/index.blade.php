<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    @role('admin')
        <div class="flex flex-row justify-between items-center">
            <a href="{{ route('admin.user.create') }}"
                class="ml-auto mr-8 font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                Add Staff
            </a>
        </div>
    @endrole

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

                <!-- Waiting List Button -->
                <a href="{{ route('admin.user.index', ['status' => 'waiting']) }}"
                    class="font-bold py-3 px-6 
                        {{ request()->get('status') == 'waiting' ? 'bg-yellow-500 text-white' : 'bg-white text-gray-700' }} 
                    rounded-full relative">
                    Waiting List
                    @if ($waitingCount > 0)
                        <span
                            class="absolute top-0 right-0 w-5 h-5 text-xs text-white bg-red-500 rounded-full flex items-center justify-center">
                            {{ $waitingCount }}
                        </span>
                    @endif
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($users as $user)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- User Info -->
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[500px]">
                                    {{ $user->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $user->email }}</p>

                                @if (
                                    ($user->hasRole('student') && $user->student && $user->student->studyProgram) ||
                                        ($user->hasRole('staff') && $user->staff && $user->staff->studyProgram))
                                    <p class="text-slate-1000 text-sm font-bold" style="padding-top: 10px">
                                        {{ $user->hasRole('student') ? $user->student->studyProgram->study_program_Name : $user->staff->studyProgram->study_program_Name }}
                                    </p>
                                @elseif(isset($programNames[$user->id]))
                                    <p class="text-slate-1000 text-sm font-bold" style="padding-top: 10px">
                                        {{ $programNames[$user->id] }}
                                    </p>
                                @else
                                    <p class="text-slate-500 text-sm font-bold" style="padding-top: 10px">Undefined</p>
                                @endif
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            @if (request()->get('status') == 'waiting')
                                <!-- Accept Button -->
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to accept this user?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="accept">
                                    <button type="submit"
                                        class="font-bold py-4 px-6 bg-green-800 text-white rounded-full">
                                        Accept
                                    </button>
                                </form>

                                <!-- Reject Button -->
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to reject this user?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit"
                                        class="font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                        Reject
                                    </button>
                                </form>
                            @elseif(request()->get('role') == 'staff')
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                        Delete
                                    </button>
                                </form>
                                @else
                                <!-- Toggle Active/Inactive -->
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <button type="submit"
                                        class="font-bold py-4 px-6 rounded-full text-white
                                        {{ $user->student->isActive ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }}"
                                        name="isActive" value="{{ $user->student->isActive ? 0 : 1 }}">
                                        {{ $user->student->isActive ? 'Aktif' : 'Tidak Aktif' }}
                                    </button>
                                </form>

                                <!-- Delete Button -->
                                <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-bold py-4 px-6 bg-red-500 text-white rounded-full hover:bg-red-600">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
