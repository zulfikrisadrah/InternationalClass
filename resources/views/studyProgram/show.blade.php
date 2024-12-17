@extends('layouts.main')

@section('title', $programs->study_program_Name)

@section('content')
    <div class="flex flex-col leading-none whitespace-nowrap">
        <div
            class="flex flex-col justify-center items-start px-16 py-8 w-full bg-blueSecondary max-md:px-5 max-md:max-w-full">
            <div class="breadcrumbs text-white">
                <ul>
                    <li><a href="{{ route('studyProgram.index') }}">Study Programs</a></li>
                    <li>{{ $programs->study_program_Name }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="container mx-auto px-4 py-12 max-w-7xl">
        <div class="space-y-6">
            <div class="text-center md:text-left">
                <h2 class="text-3xl md:text-4xl font-bold text-blueThird mb-2">
                    {{ $programs->study_program_Name }}
                </h2>
                <p class="text-base md:text-lg text-gray-600 uppercase">
                    FACULTY OF {{ strtoupper($programs->faculty->Faculty_Name) }}
                </p>
            </div>

            <div class="card bg-base-100 shadow-xl p-6 md:p-8">
                <div class="card-body">
                    <h3 class="card-title text-xl md:text-2xl text-blueThird">
                        Program Description
                    </h3>
                    <p class="text-base text-gray-700">
                        {{ $programs->study_program_Description }}
                    </p>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl p-6 md:p-8">
                <div class="card-body">
                    <h3 class="card-title text-xl md:text-2xl text-blueThird">
                        Program Highlights
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-4">
                        <div class="space-y-4">
                            <div class="flex items-center bg-blue-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-blueThird text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-blueThird">Outstanding Accreditation</h4>
                                    <p class="text-xs text-gray-600">
                                        National Accreditation: {{ $programs->national_accreditation }} |
                                        International Accreditation: {{ $programs->international_accreditation }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center bg-green-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-green-500 text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-green-700">Academic Environment</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ $programs->classrooms }} classrooms with {{ $programs->lecturers }} professional
                                        educators
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center bg-teal-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-teal-500 text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-teal-700">Program Management</h4>
                                    <p class="text-xs text-gray-600">
                                        Program Director: {{ $programs->director_name }}
                                        <br>Contact: {{ $programs->director_contact }}
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-4">
                            <div class="flex items-center bg-purple-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-purple-500 text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-purple-700">International Exposure</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ $programs->international_exposure }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center bg-orange-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-orange-500 text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-orange-700">Tuition Fees</h4>
                                    <p class="text-sm text-gray-600">
                                        UKT: IDR {{ number_format($programs->ukt_fee, 2, ',', '.') }} |
                                        IPI: IDR {{ number_format($programs->ipi_fee, 2, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            <div class="flex items-center bg-yellow-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-yellow-500 text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-yellow-700">Opening Year</h4>
                                    <p class="text-sm text-gray-600">
                                        {{ $programs->opening_year }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="card bg-gradient-to-br from-blue-100 to-blue-200 hover:from-blue-200 hover:to-blue-300 transition-all duration-300 transform hover:-translate-y-2 shadow-lg">
                <div class="card-body">
                    <div class="flex justify-between items-center mb-4">
                        <h4 class="text-xl font-bold text-blueThird">
                            Curriculum Details
                        </h4>
                    </div>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blueThird" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z" />
                                    <path fill-rule="evenodd"
                                        d="M4 5a2 2 0 012-2 3 3 0 003 3h2a3 3 0 003-3 2 2 0 012 2v11a2 2 0 01-2 2H6a2 2 0 01-2-2V5zm3 4a1 1 0 000 2h.01a1 1 0 100-2H7zm3 0a1 1 0 000 2h3a1 1 0 100-2h-3zm-3 4a1 1 0 100 2h.01a1 1 0 100-2H7zm3 0a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Total Courses</span>
                            </div>
                            <span class="font-semibold text-blueThird">
                                {{ $programs->total_courses }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blueThird"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path
                                        d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z" />
                                </svg>
                                <span class="text-sm text-gray-700">Courses in English</span>
                            </div>
                            <span class="font-semibold text-blueThird">
                                {{ $programs->rps_courses_in_english }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blueThird"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2h-3a1 1 0 01-1-1v-2a1 1 0 00-1-1H6a1 1 0 00-1 1v2a1 1 0 01-1 1H1a1 1 0 110-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Teaching Materials</span>
                            </div>
                            <span class="font-semibold text-blueThird">
                                {{ $programs->teaching_materials_in_english }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blueThird"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                    <path fill-rule="evenodd"
                                        d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Courses Delivered in English</span>
                            </div>
                            <span class="font-semibold text-blueThird">
                                {{ $programs->courses_delivered_in_english }}
                            </span>
                        </div>
                        <div class="flex justify-between items-center">
                            <div class="flex items-center space-x-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blueThird"
                                    viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5zm3.293 1.293a1 1 0 011.414 0l3 3a1 1 0 010 1.414l-3 3a1 1 0 01-1.414-1.414L7.586 10 5.293 7.707a1 1 0 010-1.414zM11 12a1 1 0 100 2h3a1 1 0 100-2h-3z"
                                        clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm text-gray-700">Courses in Sikola</span>
                            </div>
                            <span class="font-semibold text-blueThird">
                                {{ $programs->courses_fully_filled_in_sikola }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card bg-base-100 shadow-xl p-6 md:p-8">
                <div class="card-body">
                    <h3 class="card-title text-xl md:text-2xl text-blueThird">
                        Partnership
                    </h3>
                    <div class="grid grid-cols-1 gap-6 mt-4">
                        @foreach ($programs->partnerships as $partnership)
                            <div class="flex items-center bg-blue-50 p-4 rounded-lg shadow-sm">
                                <div class="bg-blueThird text-white rounded-full p-3 mr-4">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-blueThird">{{ $partnership->title_of_cooperation }}</h4>
                                    <p class="text-sm text-gray-600">
                                        <span class="font-semibold">MOU/MOA/IA Number:</span>
                                        {{ $partnership->mou_moa_ia_number }}<br>
                                        <span class="font-semibold">Validity Period:</span>
                                        {{ $partnership->validity_period }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="flex overflow-hidden flex-col py-12 bg-gray-200" data-aos="fade-up">
        <div class="container mx-auto">
            <div class="flex flex-col items-start mx-[70px] pt-9 pb-24">
                <!-- Title -->
                <h2 class="self-center text-5xl font-bold text-center text-stone-900 max-md:text-4xl" data-aos="fade-down"
                    data-aos-duration="1000">
                    News and <span class="text-stone-900">Events</span>
                </h2>
                <div class="mt-7 w-full max-w-[1246px] max-md:max-w-full">
                    <div class="flex gap-5 max-md:flex-col">
                        <!-- News Articles -->
                        <div class="flex flex-col w-[56%] max-md:ml-0 max-md:w-full">
                            <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                                <div class="flex flex-wrap gap-6 justify-center items-center text-xs text-black">
                                    @foreach ($news as $new)
                                        <article class="flex flex-col self-stretch w-[200px]" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <div
                                                class="flex flex-col justify-between pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)] min-h-[400px]">
                                                @if ($new->News_Image)
                                                    <img loading="lazy" src="{{ asset('storage/' . $new->News_Image) }}"
                                                        alt="News article image"
                                                        class="object-cover w-full aspect-[1.69]" />
                                                @endif
                                                <div class="flex flex-col flex-grow justify-between pr-1.5 pl-2.5">
                                                    <time datetime="{{ $new->Publication_Date->format('Y-m-d') }}"
                                                        class="self-start mt-1 text-xs font-light text-grey-200">
                                                        {{ $new->Publication_Date->format('M d, Y') }}
                                                    </time>
                                                    <h4 class="mt-3 text-xs font-semibold max-md:mr-1">
                                                        {{ Str::limit($new->News_Title, 80) }}
                                                    </h4>
                                                    <p class="mt-2 flex-grow break-words">
                                                        {{ Str::limit(html_entity_decode(strip_tags($new->News_Content)), 100) }}
                                                    </p>
                                                    <a href="{{ route('news.show', $new->ID_News) }}"
                                                        class="self-center px-5 py-2 max-w-full text-center border border-black border-solid
                                                                        hover:bg-indigo-950 hover:text-white w-[150px] max-md:px-10 max-md:mt-5">
                                                        Read more
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Events -->
                        <aside class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                            @foreach ($events as $event)
                                <a href="{{ route('event.show', $event->ID_Event) }}"
                                    class="flex flex-col mb-5 items-start py-8 pr-3.5 pl-7 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full"
                                    data-aos="fade-left" data-aos-delay="200">
                                    <h4 class="font-semibold">
                                        {{ Str::limit($event->Event_Title, 100) }}
                                    </h4>
                                    <p class="self-stretch mt-1 max-md:max-w-full break-words">
                                        {{ Str::limit(html_entity_decode(strip_tags($event->Event_Content)), 100, '...') }}
                                    </p>
                                    <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                        <time datetime="{{ $event->Event_Date->format('Y-m-d') }}">
                                            {{ $event->Event_Date->format('d M, Y') }}
                                        </time>
                                    </div>
                                </a>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
