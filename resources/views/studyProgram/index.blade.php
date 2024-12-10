@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
    <section class="mx-16 my-12" data-aos="fade-up">
        <h2 class="text-bluePrimary text-3xl font-bold mt-12 mb-6" data-aos="fade-right" data-aos-duration="1200">
            Study Program
        </h2>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($programs as $index => $program)
                <a href="{{ route('studyProgram.show', $program->ID_study_program) }}">
                    <div class="card bg-bluePrimary text-white w-64 h-96 shadow-lg justify-center" data-aos="flip-left"
                        data-aos-delay="{{ 200 * ($index + 1) }}">
                        <figure>
                            <img src="{{ asset($program->study_program_Image) }}"
                                alt="{{ $program['study_program_Name'] }}" class="w-full rounded-t-lg">
                        </figure>
                        <div class="card-body p-4 flex flex-col justify-between flex-grow">
                            <!-- Nama Program -->
                            <h3 class="mt-2 text-lg font-semibold">{{
                                $program['study_program_Name'] }}</h3>
                            
                            <!-- Nama Fakultas -->
                            <p class="absolute bottom-0 left-0 p-4 text-sm">{{ $program->faculty->Faculty_Name }}</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

    </section>
@endsection
