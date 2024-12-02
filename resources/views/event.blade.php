@extends('layouts.main')

@section('title', 'Hasanuddin University - Event')

@section('content')
<section class="flex flex-col mx-[70px] my-[70px]">
    <div class="w-full max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
            <div class="flex flex-col items-center w-full max-w-[700px] mx-auto px-4">
                @foreach ($events_page as $event)
                    <div
                        class="w-full max-w-[650px] mb-8 bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
                        @if($event->Event_Image)
                            <div class="relative w-full bg-white rounded-1xl border-indigo-900 border-t-[8px] shadow-[0px_2px_20px_rgba(0,0,0,0.25)]">
                                <img src="{{ asset('storage/' . $event->Event_Image) }}"
                                    alt="Featured Image for {{ $event->Event_Title }}"
                                    class="w-full h-auto object-cover aspect-video">
                            </div>
                        @endif
                        <div class="p-6">
                            <h2 class="text-lg md:text-xl font-semibold text-black mb-3 ">
                                {{ Str::limit($event->Event_Title, 150) }}
                            </h2>
                            <p class="text-gray-700 text-sm md:text-base leading-relaxed line-clamp-3">
                                {{ Str::limit(html_entity_decode(strip_tags($event->Event_Content)), 150, '...') }}
                            </p>
                            <div class="flex gap-3.5 mt-4 text-xs text-stone-900 items-center">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/54dd47234fe65d04e71c811fa488ce1f689e2dcd29f8ab5867c046e648130cf9?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                    alt="" class="object-contain shrink-0 self-start w-6 aspect-[1.2]" />
                                <time datetime="{{ $event->event_date }}" class="text-xs text-gray-500">
                                    {{ \Carbon\Carbon::parse($event->event_date)->format('d M, Y') }}
                                </time>
                                <a href="{{ route('event.index', $event->id) }}"
                                    class="ml-auto text-sm text-indigo-600 font-medium hover:underline">
                                    Read More →
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="mt-4 flex justify-center space-x-3 items-center">
                    <nav class="self-center text-5xl font-semibold text-black max-md:mt-10"
                        aria-label="Event navigation">
                        @if ($events_page->currentPage() > 1)
                            <a href="{{ $events_page->previousPageUrl() }}"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                                &lt;
                            </a>
                        @else
                            <span class="text-gray-400 cursor-not-allowed">
                                &lt;
                            </span>
                        @endif
                        @if ($events_page->hasMorePages())
                            <a href="{{ $events_page->nextPageUrl() }}"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                                &gt;
                            </a>
                        @else
                            <span class="text-gray-400 cursor-not-allowed">
                                &gt;
                            </span>
                        @endif
                    </nav>
                </div>

                <div class="mt-4 flex justify-center space-x-3 items-center">
                    @if ($events_page->currentPage() > 3)
                        <a href="{{ $events_page->url(1) }}" class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 bg-white 
                                        text-black hover:text-white hover:bg-indigo-400">1</a>
                    @endif

                    @if ($events_page->currentPage() > 4)
                        <span class="text-gray-500">...</span>
                    @endif

                    @php
                        $start = max(1, $events_page->currentPage() - 2);
                        $end = min($events_page->lastPage(), $events_page->currentPage() + 2);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $events_page->url($i) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 
                                        {{ $events_page->currentPage() == $i ? 'bg-indigo-950 text-white' : 'hover:text-white hover:bg-indigo-400 ' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($events_page->currentPage() < $events_page->lastPage() - 2)
                        <span class="text-gray-500">...</span>
                    @endif

                    @if ($events_page->currentPage() < $events_page->lastPage() && $events_page->lastPage() - $events_page->currentPage() > 2)
                        <a href="{{ $events_page->url($events_page->lastPage()) }}" class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 
                                        bg-white text-black hover:text-white hover:bg-indigo-400 ">
                            {{ $events_page->lastPage() }}
                        </a>
                    @endif
                </div>
            </div>
            <div class="flex flex-col w-[59%] max-md:ml-0 max-md:w-full">
                <h2 class="px-6 py-2 mb-5 text-lg font-semibold text-white bg-indigo-950 rounded-md 
                    text-center w-full max-w-[650px] mx-auto">
                    Big Event
                </h2>
                <div class="flex flex-col items-center w-full max-w-[650px] mx-auto px-4">
                    @foreach ($big_events_page as $big_event)
                        <div
                            class="w-full max-w-[650px] mb-8 bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_20px_rgba(0,0,0,0.25)] border-gray-200">
                            <div class="p-6">
                                <h2 class="text-lg md:text-xl font-semibold text-black mb-3 ">
                                {{ Str::limit($big_event->Event_Title, 150) }}
                                </h2>
                                <p class="text-gray-700 text-sm md:text-base leading-relaxed line-clamp-3">
                                    {{ Str::limit(html_entity_decode(strip_tags($big_event->Event_Content)), 150, '...') }}
                                </p>
                                <div class="flex gap-3.5 mt-4 text-xs text-stone-900 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/54dd47234fe65d04e71c811fa488ce1f689e2dcd29f8ab5867c046e648130cf9?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                        alt="" class="object-contain shrink-0 self-start w-6 aspect-[1.2]" />
                                    <time datetime="{{ $big_event->Event_date }}" class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($big_event->Event_date)->format('d M, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button
                        class="self-center px-6 py-3 mt-1 mb-10 w-[200px] text-xs text-center whitespace-nowrap border 
                        border-black border-solid hover:bg-indigo-950 hover:text-white rounded-md max-md:px-5 max-md:mt-10">
                        See More
                    </button>

                </div>
                <h2 class="px-6 py-2 mt-5 mb-5 text-lg font-semibold text-white bg-indigo-950 
                    rounded-md text-center w-full max-w-[650px] mx-auto">
                    Upcoming Event
                </h2>
                <div class="flex flex-col items-center w-full max-w-[650px] mx-auto px-4">
                    @foreach ($upcoming_events_page as $upcoming_event)
                        <div class="w-full max-w-[650px] mb-8 bg-white rounded-3xl border-indigo-900 border-t-[6px] 
                            shadow-[0px_2px_20px_rgba(0,0,0,0.25)] border-gray-200">
                            <div class="p-6">
                                <h2 class="text-lg md:text-xl font-semibold text-black mb-3 ">
                                {{ Str::limit($upcoming_event->Event_Title, 150) }}
                                </h2>
                                <p class="text-gray-700 text-sm md:text-base leading-relaxed line-clamp-3">
                                    {{ Str::limit(html_entity_decode(strip_tags($upcoming_event->Event_Content)), 150, '...') }}
                                </p>
                                <div class="flex gap-3.5 mt-4 text-xs text-stone-900 items-center">
                                    <img loading="lazy"
                                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/54dd47234fe65d04e71c811fa488ce1f689e2dcd29f8ab5867c046e648130cf9?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                        alt="" class="object-contain shrink-0 self-start w-6 aspect-[1.2]" />
                                    <time datetime="{{ $upcoming_event->event_date }}" class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($upcoming_event->event_date)->format('d M, Y') }}
                                    </time>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <button
                        class="self-center px-6 py-3 mt-1 mb-10 w-[200px] text-xs text-center whitespace-nowrap 
                        border border-black border-solid hover:bg-indigo-950 hover:text-white rounded-md max-md:px-5 max-md:mt-10">
                        See More
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection