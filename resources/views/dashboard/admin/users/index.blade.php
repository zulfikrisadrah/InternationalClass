<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="flex flex-row justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
        <a href="{{ route('admin.user.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
            Add Staff
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-start space-x-4 mb-5">
            <!-- All Users Button -->
            <a href="{{ route('admin.user.index') }}" 
            class="font-bold py-2 px-6 
                    {{ request()->routeIs('admin.user.index') && !request()->has('role') ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
            rounded-full">
                All
            </a>

            <!-- Staff Users Button -->
            <a href="{{ route('admin.user.index', ['role' => 'staff']) }}" 
            class="font-bold py-2 px-6 
                    {{ request()->get('role') == 'staff' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
            rounded-full">
                Staff
            </a>

            <!-- Student Users Button -->
            <a href="{{ route('admin.user.index', ['role' => 'student']) }}" 
            class="font-bold py-2 px-6 
                    {{ request()->get('role') == 'student' ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
            rounded-full">
                Student
            </a>
        </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($users as $user)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- User Avatar or Placeholder Image -->
                            @if ($user->avatar) 
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="User Avatar" class="rounded-full w-[120px] h-[120px] object-cover">
                            @else
                                <div class="w-[120px] h-[120px] bg-gray-300 rounded-full flex items-center justify-center text-gray-500">
                                    No Avatar
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[200px]">{{ $user->name }}</h3>
                                <p class="text-slate-500 text-sm">{{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Registration Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($user->created_at)->format('d M Y') }}</h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.user.edit', $user->id) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>

                            <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
