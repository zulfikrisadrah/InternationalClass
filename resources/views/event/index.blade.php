@extends('layouts.main')

@section('title', 'Hasanuddin University - Event')

@section('content')
    <section class="flex flex-col mx-[70px] my-[70px]">
        <div class="w-full max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col items-center w-full max-w-[700px] mx-auto px-4">
                    @foreach ($events_page as $event)
                        <div
                            class="w-full max-w-[650px] mb-8 bg-white rounded-3xl border-indigo-900 border-t-[8px] shadow-[0px_2px_20px_rgba(0,0,0,0.25)]">
                            @if ($event->Event_Image)
                                <div
                                    class="relative w-full h-auto bg-white rounded-3xl shadow-[0px_2px_20px_rgba(0,0,0,0.25)]">
                                    <img src="{{ asset('storage/' . $event->Event_Image) }}"
                                        alt="Featured Image for {{ $event->Event_Title }}"
                                        class="w-full h-[250px] object-cover rounded-t-2xl">
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
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="object-contain shrink-0 self-start w-6 aspect-[1.2]" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                        </path>
                                    </svg>
                                    <time datetime="{{ $event->Event_Date }}" class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($event->Event_Date)->format('d M, Y') }}
                                    </time>
                                    <a href="{{ route('event.show', $event->ID_Event) }}"
                                        class="ml-auto text-sm text-blueThird font-medium hover:underline">
                                        Read More →
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if ($events_page->lastPage() > 1)
                        <div class="mt-6">
                            {{ $events_page->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col w-[59%] max-md:ml-0 max-md:w-full">
                    <h2
                        class="px-6 py-2 mt-5 mb-5 text-lg font-semibold text-white bg-indigo-950
                    rounded-md text-center w-full max-w-[650px] mx-auto">
                        Upcoming Event
                    </h2>
                    <div class="flex flex-col items-center w-full max-w-[650px] mx-auto px-4">
                        @foreach ($upcoming_events_page as $upcoming_event)
                            <a a href="{{ route('event.show', $upcoming_event->ID_Event) }}"
                                class="flex flex-col mb-5 items-start py-8 pr-3.5 pl-7 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full"
                                data-aos="fade-left" data-aos-delay="200">

                                <h4 class="font-semibold">
                                    {{ Str::limit($upcoming_event->Event_Title, 100) }}
                                </h4>

                                <p class="self-stretch mt-1 max-md:max-w-full break-words">
                                    {{ Str::limit(html_entity_decode(strip_tags($upcoming_event->Event_Content)), 100, '...') }}
                                </p>
                                <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                                    <svg xmlns="http://www.w3.org/2000/svg"
                                        class="object-contain shrink-0 self-start w-6 aspect-[1.2]" viewBox="0 0 24 24"
                                        fill="currentColor">
                                        <path
                                            d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                        </path>
                                    </svg>
                                    <time datetime="{{ $upcoming_event->Event_Date->format('Y-m-d') }}">
                                        {{ $upcoming_event->Event_Date->format('d M, Y') }}
                                    </time>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
