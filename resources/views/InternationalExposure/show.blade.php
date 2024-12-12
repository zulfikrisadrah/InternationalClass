@extends('layouts.main')

@section('title', 'Program - ' . $programItem->program_Name)

@section('content')
    <section class="flex flex-col items-center mx-8 my-16">
        <div class="w-full max-w-7xl p-4 sm:p-6 bg-white shadow-lg rounded-lg">
            <article class="prose lg:prose-xl w-full max-w-full mx-auto">

                <!-- Gambar Program -->
                @if ($programItem->program_Image)
                    <div class="relative w-full mb-8 overflow-hidden rounded-lg shadow-md">
                        <img loading="lazy" src="{{ asset('storage/' . $programItem->program_Image) }}"
                            alt="Featured Image for {{ $programItem->program_Name }}"
                            class="w-full h-auto object-cover max-h-[600px]" />
                    </div>
                @endif

                <div class="flex items-center text-zinc-500 font-light mb-4 space-x-4">
                    <time datetime="{{ $programItem->Execution_Date }}" class="badge badge-outline">
                        {{ \Carbon\Carbon::parse($programItem->Execution_Date)->format('F d, Y') }}
                    </time>
                </div>

                <h1 class="text-4xl sm:text-5xl font-bold text-primary mb-6">
                    {{ $programItem->program_Name }}
                </h1>

                <!-- Tanggal Event -->
                @if ($programItem->Event_Date)
                    <div class="flex items-center text-zinc-500 font-light mb-4 space-x-4">
                        <span class="badge badge-outline">
                            Event Date: {{ \Carbon\Carbon::parse($programItem->Event_Date)->format('F d, Y') }}
                        </span>
                    </div>
                @endif

                <div class="mt-6 text-lg leading-relaxed text-gray-800">
                    {!! html_entity_decode($programItem->program_description) !!}
                </div>

                @if (strtotime($programItem->Execution_Date) > time())
                    <div class="mt-6 text-center">
                        <a href="/login" class="btn btn-primary">
                            Register Now
                        </a>
                    </div>
                @endif

                <div class="mt-10 text-end">
                    <a href="{{ route('InternationalExposure.index') }}" class="btn btn-outline btn-primary">
                        Back To Programs
                    </a>
                </div>
            </article>
        </div>
    </section>
@endsection
