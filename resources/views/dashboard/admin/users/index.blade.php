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
            <div class="flex justify-between mb-5">
                <!-- Filter Buttons -->
                <div class="flex space-x-4">
                    <!-- All Users Button -->
                    <a href="{{ route('admin.user.index') }}" 
                       class="font-bold py-2 px-6 
                              {{ !request()->has('role') && !request()->has('status') ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
                       rounded-full">
                        All
                    </a>
            
                    <!-- Staff Users Button -->
                    <a href="{{ route('admin.user.index', ['role' => 'staff']) }}" 
                       class="font-bold py-2 px-6 
                              {{ request()->get('role') == 'staff' && !request()->has('status') ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
                       rounded-full">
                        Staff
                    </a>
            
                    <!-- Student Users Button -->
                    <a href="{{ route('admin.user.index', ['role' => 'student']) }}" 
                        class="font-bold py-2 px-6 
                               {{ request()->get('role') == 'student' && !request()->has('status') ? 'bg-blue-500 text-white' : 'bg-white text-gray-700' }} 
                        rounded-full">
                         Student
                     </a>                     
                </div>
            
                <!-- Waiting List Button -->
                <a href="{{ route('admin.user.index', ['status' => 'waiting']) }}" 
                   class="font-bold py-2 px-6 
                          {{ request()->get('status') == 'waiting' ? 'bg-yellow-500 text-white' : 'bg-white text-gray-700' }} 
                   rounded-full relative">
                    Waiting List 
                    @if($waitingCount > 0)
                        <span class="absolute top-0 right-0 inline-block w-5 h-5 text-xs text-white bg-red-500 rounded-full flex items-center justify-center">
                            {{ $waitingCount }}
                        </span>
                    @endif
                </a>                 
            </div>               

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($users as $user)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
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

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            @if (request()->get('status') == 'waiting')
                                <!-- Accept Button -->
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to accept this user?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="accept">
                                    <button type="submit" class="font-bold py-4 px-6 bg-green-500 text-white rounded-full">
                                        Accept
                                    </button>
                                </form>

                                <!-- Reject Button -->
                                <form action="{{ route('admin.user.update', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to reject this user?');">
                                    @csrf
                                    @method('PATCH')
                                    <input type="hidden" name="action" value="reject">
                                    <button type="submit" class="font-bold py-4 px-6 bg-red-500 text-white rounded-full">
                                        Reject
                                    </button>
                                </form>
                            @else
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
                            @endif
                        </div>                  
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
