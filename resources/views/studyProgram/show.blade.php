@extends('layouts.main')

@section('title', $programs->study_program_Name)

@section('content')
<div class="flex flex-col leading-none whitespace-nowrap">
    <div class="flex flex-col justify-center items-start px-16 py-8 w-full bg-blueSecondary max-md:px-5 max-md:max-w-full">
        <div class="breadcrumbs text-white">
            <ul>
                <li><a href="{{ route('studyProgram.index') }}">Study Programs</a></li>
                <li>{{ $programs->study_program_Name }}</li> 
            </ul>
        </div>
    </div>
</div>

<section class="flex flex-col items-start text-blueThird mx-[70px] my-[70px]">
    <h2 class="text-4xl font-semibold">{{ $programs->study_program_Name }}</h2>
    <p class="text-lg text-black mt-2">FAKULTAS {{ strtoupper($programs->faculty->Faculty_Name) }}</p>

    <div class="mt-6 text-black">
        <h3 class="text-2xl font-semibold mb-2">Deskripsi Program</h3>
        <p>{{ $data['description'] }}</p>
    </div>

    <div class="mt-6 text-black">
        <h3 class="text-2xl font-semibold mb-2">
            Why Should You Choose <span class="capitalize">{{ $programs->study_program_Name }}</span>
        </h3>

        <p>{{ $data['description'] }}</p>
    </div>

    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Job Prospects</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prospects as $prospect)
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl">
                    <div class="flex flex-col space-y-4">
                        <h4 class="text-xl font-semibold text-blueThird">{{ $prospect->name }}</h4>
                        <p class="text-neutral-600">{{ $prospect->description }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
