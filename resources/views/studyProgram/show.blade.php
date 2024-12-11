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
        <p>{{ $data_config['description'] }}</p>
    </div>

    <div class="mt-6 text-black">
        <h3 class="text-2xl font-semibold mb-2">
            Why Should You Choose <span class="capitalize">{{ $programs->study_program_Name }}</span>
        </h3>

        <p>{{ $data_config['whychoose'] }}</p>
    </div>

    <div class="mt-8">
        <h3 class="text-2xl font-semibold mb-4">Job Prospects</h3>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($prospects as $prospect)
                <div class="bg-white p-6 rounded-lg shadow-lg transition-transform transform hover:scale-105 hover:shadow-xl">
                    <div class="flex flex-col space-y-4">
                        <h4 class="text-xl font-semibold text-blueThird">{{ $prospect['name'] }}</h4>
                        <p class="text-neutral-600">{{ $prospect['description'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<section class="flex overflow-hidden flex-col py-12 bg-gray-200" data-aos="fade-up">
    <div class="container mx-auto">
        <div class="flex flex-col items-start mx-[70px] pt-9 pb-24">
            <!-- Title -->
            <h2 class="self-center text-5xl font-bold text-center text-stone-900 max-md:text-4xl"
                data-aos="fade-down" data-aos-duration="1000">
                News and <span class="text-stone-900">Events</span>
            </h2>
            <!-- Buttons and Event Categories -->
            <div
                class="flex flex-wrap gap-5 justify-between mt-24 w-full text-center max-md:mt-10 max-md:max-w-full">
                <h2 class="text-black text-3xl font-semibold ps-4" data-aos="fade-right" data-aos-duration="1000">
                    Latest News</h2>
                <div class="flex gap-10">
                    <a href="{{ route('news.index') }}">
                        <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5"
                            data-aos="zoom-in" data-aos-delay="400">
                            View all
                        </button>
                    </a>

                    <h2 class="text-black text-3xl font-semibold ps-4" data-aos="fade-left"
                        data-aos-duration="1000">Upcoming Events</h2>
                </div>
                <a href="{{ route('event.index') }}">
                    <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5"
                        data-aos="zoom-in" data-aos-delay="400">
                        View all
                    </button>
                </a>

            </div>
            <!-- Articles Section -->
            <div class="mt-7 w-full max-w-[1246px] max-md:max-w-full">
                <div class="flex gap-5 max-md:flex-col">
                    <!-- Articles List -->
                    <div class="flex flex-col w-[56%] max-md:ml-0 max-md:w-full">
                        <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                            <div class="flex flex-wrap gap-6 justify-center items-center text-xs text-black">
                                @foreach ($news as $new)
                                    <article class="flex flex-col self-stretch w-[200px]" data-aos="fade-up"
                                        data-aos-delay="200">
                                        <div
                                            class="flex flex-col justify-between pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)] min-h-[400px]">
                                            @if ($new->News_Image)
                                                <img loading="lazy"
                                                    src="{{ asset('storage/' . $new->News_Image) }}"
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
                                                <p class="mt-2 flex-grow">
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
                    <!-- Sidebar Articles -->
                    <aside class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                        @foreach ($events as $event)
                                    <a a href="{{ route('event.show', $event->ID_Event) }}"
                                        class="flex flex-col mb-5 items-start py-8 pr-3.5 pl-7 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full"
                                        data-aos="fade-left" data-aos-delay="200">

                                        <h4 class="font-semibold">
                                            {{ Str::limit($event->Event_Title, 100) }}
                                        </h4>

                                        <p class="self-stretch mt-1 max-md:max-w-full">
                                            {{ Str::limit(html_entity_decode(strip_tags($event->Event_Content)), 100, '...') }}
                                        </p>
                                        <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                            <img loading="lazy"
                                                src="https://cdn.builder.io/api/v1/image/assets/TEMP/54dd47234fe65d04e71c811fa488ce1f689e2dcd29f8ab5867c046e648130cf9?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                                alt="Calendar Icon"
                                                class="object-contain shrink-0 self-start w-5 aspect-square" />
                                            <time datetime="{{ $event->Publication_Date->format('Y-m-d') }}">
                                                {{ $event->Publication_Date->format('d M, Y') }}
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
