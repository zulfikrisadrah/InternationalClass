@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
<div class="flex flex-col leading-none whitespace-nowrap">
    <div
        class="flex flex-col justify-center items-start px-16 py-12 w-full bg-indigo-950 max-md:px-5 max-md:max-w-full">
        
    </div>
</div>

<section class="flex flex-col items-start text-sky-700 mx-[70px] my-[70px]">
    <h2
        class="z-10 -mt-1 leading-none max-md:max-w-full text-4xl font-semibold text-center hover:text-sky-800 transition duration-300 ease-in-out">
        Study Programs International Class at Hasanuddin University
    </h2>
    <p class="self-stretch mt-8 text-2xl text-neutral-700 text-justify max-md:max-w-full">
        {{ $data['description'] ?? '' }}
    </p>

    <!-- Design with program and faculty below, and smaller font for program name -->
    <div class="mt-8 flex flex-col gap-6">
        @foreach ($programs as $index => $program)
            <div class="transform transition duration-300 ease-in-out">
                <h3 class="text-lg font-semibold">{{ $loop->iteration }}. {{ $program->study_program_Name }}</h3>
                <p class="text-sm text-neutral-600 mt-1">FAKULTAS {{ strtoupper($program->faculty->Faculty_Name) }}</p>
            </div>
        @endforeach
    </div>
</section>

<section class="flex overflow-hidden flex-col py-12 bg-gray-200">
    <div class="container mx-auto">
        <div class="flex flex-col items-start mx-[70px] pt-9 pb-24 ">
            <h2 class="self-center text-5xl font-bold text-center text-stone-900 max-md:text-4xl">
                News and <span class="text-stone-900">Events</span>
            </h2>
            <div class="flex flex-wrap gap-5 justify-between mt-24 w-full text-center max-md:mt-10 max-md:max-w-full">
                <h2 class="text-black text-3xl font-semibold ps-4">Latest Event</h2>
                <div class="flex gap-10">
                    <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5">View
                        all</button>
                    <h2 class="text-black text-3xl font-semibold ps-4">Upcoming Events</h2>
                </div>
                <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5">View all</button>
            </div>
            <div class="mt-7 w-full max-w-[1246px] max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                    <div class="flex flex-col w-[56%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                            <div class="flex flex-wrap gap-6 justify-center items-center text-xs text-black">
                                <article class="flex flex-col self-stretch my-auto w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                                        <div class="flex flex-col pr-1.5 pl-2.5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="flex flex-col self-stretch my-auto w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/f2c5af1fb96f55f96d9cfbf0a7ca4a5b261d7f5a0e225cdc7bb08d832908c9fd?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                                        <div class="flex flex-col pr-1.5 pl-2.5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="flex flex-col self-stretch my-auto w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/4d2fa6b6b3a8748bcf9e428401b344fa677101651eff90decfc368fe7dce518a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                                        <div class="flex flex-col pr-1.5 pl-2.5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="flex flex-wrap gap-6 justify-center items-center mt-6">
                                <article class="flex flex-col self-stretch my-auto w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <div class="flex relative flex-col aspect-[1.695] w-[200px]">
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/7c7f1b1279f59f1a0df39b93f91aa64eb396ae076b53da329ddb7e8e2c45213e?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                                alt="Background image"
                                                class="object-cover absolute inset-0 size-full" />
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/4d2fa6b6b3a8748bcf9e428401b344fa677101651eff90decfc368fe7dce518a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                                alt="Foreground image" class="object-contain w-full aspect-[1.69]" />
                                        </div>
                                        <div class="flex flex-col pr-1.5 pl-2.5 text-xs text-black">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="flex flex-col self-stretch my-auto text-xs text-black w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                                        <div class="flex flex-col pr-1.5 pl-2.5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                                <article class="flex flex-col self-stretch my-auto text-xs text-black w-[200px]">
                                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                                        <div class="flex flex-col pr-1.5 pl-2.5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-xs font-light text-neutral-200">May 13,
                                                2024</time>
                                            <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed
                                                Ahmad Buzdar along with the facullty...</h4>
                                            <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty
                                                of Physical and Mathematical Sciences has said that the British
                                                Council project Pak UK Education</p>
                                            <a href="#"
                                                class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read
                                                more</a>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                    <aside class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col grow mt-3.5 text-sm text-black max-md:mt-10 max-md:max-w-full">
                            <article
                                class="flex flex-col items-start py-8 pr-3.5 pl-7 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full">
                                <h4 class="font-semibold text-center">Event Title</h4>
                                <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training
                                    workshop for teachers organized by Seerat Chair, IUB is starting from 13 May
                                    2024</p>
                                <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                        alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                                    <time datetime="2024-05-11">11 May, 2024</time>
                                </div>
                            </article>
                            <article
                                class="flex flex-col items-start py-8 pr-3.5 pl-7 mt-20 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:mt-10 max-md:max-w-full">
                                <h4 class="font-semibold text-center">Event Title</h4>
                                <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training
                                    workshop for teachers organized by Seerat Chair, IUB is starting from 13 May
                                    2024</p>
                                <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                        alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                                    <time datetime="2024-05-11">11 May, 2024</time>
                                </div>
                            </article>
                            <article
                                class="flex flex-col items-start py-8 pr-3.5 pl-7 mt-20 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:mt-10 max-md:max-w-full">
                                <h4 class="font-semibold text-center">Event Title</h4>
                                <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training
                                    workshop for teachers organized by Seerat Chair, IUB is starting from 13 May
                                    2024</p>
                                <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                        alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                                    <time datetime="2024-05-11">11 May, 2024</time>
                                </div>
                            </article>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
