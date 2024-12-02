@extends('layouts.main')

@section('title', 'News - Hasanuddin University')

@section('content')
<section class="flex flex-col items-start mx-[70px] my-[70px]">
    <div class="self-stretch w-full max-md:max-w-full">
        <div class="flex gap-5 max-md:flex-col">
            <!-- Main News -->
            <article class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
                @foreach($news as $newsItem)
                    <div
                        class="flex flex-col grow items-start mt-5 text-xl text-black max-md:mt-10 max-md:max-w-full mb-10">
                        @if($newsItem->News_Image)
                            <div class="relative w-full aspect-[16/9] overflow-hidden rounded-lg">
                                <img loading="lazy" src="{{ asset('storage/' . $newsItem->News_Image) }}"
                                    alt="Featured Image for {{ $newsItem->News_Title }}"
                                    class="absolute inset-0 w-full h-full object-cover" />
                            </div>
                        @endif
                        <time datetime="{{ $newsItem->Publication_Date }}"
                            class="mt-12 font-light text-zinc-500 max-md:mt-10">{{ \Carbon\Carbon::parse($newsItem->Publication_Date)->format('F d, Y') }}</time>
                        <h2 class="self-stretch mt-2 mb-5 text-4xl font-semibold max-md:max-w-full">
                            {{ $newsItem->News_Title }}
                        </h2>
                        {{ Str::limit(html_entity_decode(strip_tags($newsItem->News_Content)), 200) }}
                        <a href="{{ route('news.index', $newsItem->id) }}"
                            class="px-12 py-2.5 mt-10 text-xs text-center border border-black border-solid text-stone-900 hover:bg-indigo-950 hover:text-white max-md:px-5 max-md:ml-2">Read
                            more</a>
                    </div>
                @endforeach

                <!--Pagination-->
                <div class="mt-4 flex justify-center space-x-3 items-center">
                    <nav class="self-center text-5xl font-semibold text-black max-md:mt-10"
                        aria-label="Event navigation">
                        @if ($news->currentPage() > 1)
                            <a href="{{ $news->previousPageUrl() }}"
                                class="focus:outline-none focus:ring-2 focus:ring-blue-500">
                                &lt;
                            </a>
                        @else
                            <span class="text-gray-400 cursor-not-allowed">
                                &lt;
                            </span>
                        @endif

                        @if ($news->hasMorePages())
                            <a href="{{ $news->nextPageUrl() }}"
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
                    <!-- Pagination Links -->
                    @if ($news->currentPage() > 3)
                        <a href="{{ $news->url(1) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 bg-white text-black hover:text-white hover:bg-indigo-400">1</a>
                    @endif

                    @if ($news->currentPage() > 4)
                        <span class="text-gray-500">...</span>
                    @endif

                    @php
                        $start = max(1, $news->currentPage() - 2);
                        $end = min($news->lastPage(), $news->currentPage() + 2);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $news->url($i) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 {{ $news->currentPage() == $i ? 'bg-indigo-950 text-white' : 'hover:text-white hover:bg-indigo-400 ' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($news->currentPage() < $news->lastPage() - 2)
                        <span class="text-gray-500">...</span>
                    @endif

                    @if ($news->currentPage() < $news->lastPage() && $news->lastPage() - $news->currentPage() > 2)
                        <a href="{{ $news->url($news->lastPage()) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 bg-white text-black hover:text-white hover:bg-indigo-400 ">
                            {{ $news->lastPage() }}
                        </a>
                    @endif
                </div>
            </article>

            <!-- Side News -->
            <aside class="flex flex-col ml-5 w-[45%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
                    <h3
                        class="px-6 py-2 mt-5 mb-5 text-lg font-semibold text-white bg-indigo-950 rounded-md text-center w-full max-w-[650px] mx-auto">
                        Popular News
                    </h3>
                    <div class="flex flex-col gap-5 mt-3 w-full max-md:mt-10 max-md:mr-1.5 max-md:max-w-full">
                        @foreach ($popular_news as $popular)
                            <div class="flex flex-col p-5 bg-zinc-300 rounded-lg shadow-md">
                                <div class="flex items-start gap-5">
                                    @if($popular->News_Image)
                                        <img loading="lazy" src="{{ asset('storage/' . $popular->News_Image) }}"
                                            alt="Thumbnail for {{ $popular->News_Title }}"
                                            class="max-w-[108px] w-[108px] aspect-[1.12]" />
                                    @endif

                                    <div class="flex flex-col w-full">
                                        <time datetime="{{ $popular->Publication_Date }}"
                                            class="text-base font-light text-zinc-500">
                                            {{ \Carbon\Carbon::parse($popular->Publication_Date)->format('F d, Y') }}
                                        </time>
                                        <h4 class="mt-1 text-xl font-semibold text-black">
                                            {{ Str::limit($popular->News_Title, 70) }}
                                        </h4>
                                    </div>
                                </div>
                                <p class="text-sm text-black mt-3">
                                    {{ Str::limit(html_entity_decode(strip_tags($popular->News_Content)), 200) }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </aside>
        </div>
    </div>
</section>
@endsection