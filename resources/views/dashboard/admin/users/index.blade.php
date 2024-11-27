<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
{{-- 
    <div class="flex flex-row justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage User') }}
        </h2>
        <a href="{{ route('admin.user.create') }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
            Add New
        </a>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($users as $user)
                <div class="item-card flex flex-row justify-between items-center">
                    <div class="flex flex-row items-center gap-x-3">
                        <img src="{{ $user->profile_image ?? 'https://images.unsplash.com/photo-1552196563-55cd4e45efb3?q=80&w=3426&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D' }}" alt="User Image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                        <div class="flex flex-col">
                            <h3 class="text-indigo-950 text-xl font-bold">{{ $user->name }}</h3>
                        </div>
                    </div>
                    <div class="hidden md:flex flex-col">
                        <p class="text-slate-500 text-sm">Date</p>
                        <h3 class="text-indigo-950 text-xl font-bold">{{ $user->created_at->format('d M Y') }}</h3>
                    </div>
                    <div class="hidden md:flex flex-row items-center gap-x-3">
                        <form action="" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="font-bold py-4 px-6 bg-red-700 text-white rounded-full">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
                    @empty
                        <div class="text-center text-lg text-gray-600">
                            <p>No users found</p>
                        </div>
                @endforelse
            </div>
        </div>
    </div> --}}
</x-app-layout>
