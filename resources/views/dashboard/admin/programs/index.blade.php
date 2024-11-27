<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

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
                @foreach ($programs as $program)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Display program image -->
                            <img src="{{ asset('storage/' . $program->IeActivity_Image) }}" alt="image" class="rounded-2xl object-cover w-[120px] h-[90px]">
                            <div class="flex flex-col">
                                <h3 class="text-indigo-950 text-xl font-bold truncate max-w-[200px]">{{ $program->Activity_Name }}</h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Date</p>
                            <h3 class="text-indigo-950 text-xl font-bold">{{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M Y') }}</h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.program.edit', $program->ID_Activity) }}" class="font-bold py-4 px-6 bg-indigo-700 text-white rounded-full">
                                Edit
                            </a>

                            <form action="{{ route('admin.program.destroy', $program->ID_Activity) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this program?');">
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
