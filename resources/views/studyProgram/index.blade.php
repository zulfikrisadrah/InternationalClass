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
                    <div class="absolute top-0 left-0 mt-4 ml-4">
                        <span class="inline-flex items-center px-4 py-1 rounded-full text-sm font-semibold bg-gradient-to-r from-blueSecondary to-blueThird text-white shadow-md">
                            {{ $program->degree }}
                        </span>
                    </div>
                    <figure>
                        <img src="{{ asset('storage/' . $program->study_program_Image) }}"
                            alt="{{ $program['study_program_Name'] }}" class="rounded-t-lg h-60	w-64">
                    </figure>
                    <div class="card-body p-4 flex flex-col justify-between flex-grow">
                        <!-- Nama Program -->
                            <h3 class="mt-2 text-lg font-semibold"> {{ str_replace(' (S1)', '', $program->translated_name) }}</h3>

                        <!-- Nama Fakultas -->
                        <p class="absolute bottom-0 left-0 p-4 text-sm">{{ $program->faculty->translated_name }}</p>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </section>
@endsection
