<!-- resources/views/home.blade.php -->
@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
<!-- Content Section -->
<main class="pt-12 bg-white">
    <section class="mx-[70px]" data-aos="fade-up">
        <div class="flex flex-wrap lg:flex-nowrap gap-5">
            <!-- Image Column -->
            <div class="w-full lg:w-5/12" data-aos="fade-right" data-aos-duration="1200">
                <img src="images/imageAbout.png" class="w-full rounded-lg object-contain" style="aspect-ratio: 1.52;"
                    alt="About us illustration" />
            </div>

            <!-- Text Column -->
            <div class="w-full lg:w-7/12" data-aos="fade-left" data-aos-duration="1200" data-aos-delay="200">
                <h2 class="text-6xl font-bold text-bluePrimary pb-12">About</h2>
                <p class="text-black mt-32 lg:mt-0">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </section>

    <!-- International Exposure Program Section -->
    <section class="mx-[70px]" data-aos="fade-up">
        <h2 class="text-bluePrimary text-3xl font-semibold mt-12" data-aos="fade-right" data-aos-duration="1200">
            International Exposure Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mt-6">
            <!-- Sit In Program -->
            <div class="bg-redThird text-center p-6 rounded-[25px] h-auto w-auto" data-aos="zoom-in"
                data-aos-delay="200">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/df0b7c0c0020c3ae5a554e58ab907641b00d2291f195b9b5ca7128338c5f4ffd"
                    alt="Sit In Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Sit In Program</h3>
            </div>
            <!-- Internship Program -->
            <div class="bg-bluePrimary text-center p-6 rounded-[25px] h-auto w-auto" data-aos="zoom-in"
                data-aos-delay="400">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/47e6af7cc8fadc5828c8244b462f1a80a0aea738074ed752ec91776733d45173"
                    alt="Internship Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Internship Program</h3>
            </div>
            <!-- Short Course -->
            <div class="bg-redThird text-center p-6 rounded-[25px] h-auto w-auto" data-aos="zoom-in"
                data-aos-delay="600">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0506d877ca2e563c8f523a082e12915878ea2d34b9cff913bd70cfbc47abfe45"
                    alt="Short Course" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Short Course</h3>
            </div>
            <!-- Enrichment Program -->
            <div class="bg-bluePrimary text-center p-6 rounded-[25px] h-auto w-auto" data-aos="zoom-in"
                data-aos-delay="800">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0a91bf3fedbda6671bdbc280e33e3d35f2a01d8a849f89fdf9954da5a5486943"
                    alt="Enrichment Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Enrichment Program</h3>
            </div>
        </div>
        <p class="text-black mt-6 text-lg" data-aos="fade-up" data-aos-delay="200">Lorem ipsum dolor sit amet,
            consectetur adipiscing elit. Aenean tristique, tortor nec consequat vulputate.</p>
        <ul class="text-black list-disc pl-6 mt-4" data-aos="fade-up" data-aos-delay="400">
            <li>Student Exchange Program</li>
            <li>Sit In Program</li>
            <li>Summer Course</li>
            <li>Enrichment Program</li>
        </ul>
    </section>

    <section class="mx-[70px] my-12" data-aos="fade-up">
        <!-- Study Program Section -->
        <h2 class="text-bluePrimary text-3xl font-bold mt-12" data-aos="fade-right" data-aos-duration="1200">
            Study Program
        </h2>
        <div class="flex flex-wrap justify-center gap-6">
            @foreach ($programs as $index => $program)
                <div class="card bg-bluePrimary text-white w-64 shadow-lg justify-center"
                    data-aos="flip-left" data-aos-delay="{{ 200 * ($index + 1) }}">
                    <figure>
                        <img src="{{ asset($program->study_program_Image) }}" alt="{{ $program['study_program_Name'] }}"
                            class="w-full rounded-t-lg">
                    </figure>
                    <div class="card-body p-4">
                        <h3 class="mt-2 text-lg font-semibold">{{ $program['study_program_Name'] }}</h3>
                        <p class="text-sm">{{ $program->faculty->Faculty_Name }}</p>
                    </div>
                </div>
            @endforeach
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
                            <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5" data-aos="zoom-in" data-aos-delay="400">
                                View all
                            </button>
                        </a>

                        <h2 class="text-black text-3xl font-semibold ps-4" data-aos="fade-left"
                            data-aos-duration="1000">Upcoming Events</h2>
                    </div>
                    <a href="{{ route('event.index') }}">
                        <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5" data-aos="zoom-in" data-aos-delay="400">
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
                                                @if($new->News_Image)
                                                    <img loading="lazy" src="{{ asset('storage/' . $new->News_Image) }}"
                                                        alt="News article image" class="object-cover w-full aspect-[1.69]" />
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
                                                    <a href="{{ route('landing.page', $new->id) }}"
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
                                <article
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
                                </article>
                            @endforeach
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
