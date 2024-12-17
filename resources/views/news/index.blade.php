@extends('layouts.main')

@section('title', 'News - Hasanuddin University')

@section('content')
    <section class="flex flex-col items-start mx-[70px] my-[70px]">
        <div class="self-stretch w-full max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <!-- Main News -->
                <article class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
                    @foreach ($news_page as $newsItem)
                        <div
                            class="flex flex-col grow items-start mt-5 text-xl text-black max-md:mt-10 max-md:max-w-full mb-10">
                            @if ($newsItem->News_Image)
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
                            <a href="{{ route('news.show', $newsItem->ID_News) }}"
                                class="px-12 py-2.5 mt-10 text-xs text-center border border-black border-solid text-stone-900 hover:bg-indigo-950 hover:text-white max-md:px-5 max-md:ml-2">Read
                                more</a>
                        </div>
                    @endforeach
                    @if ($news_page->count() >= 4)
                        <div class="mt-6">
                            {{ $news_page->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </article>

                <!-- Side News -->
                <aside class="flex flex-col ml-5 w-[45%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
                        <h3
                            class="px-6 py-2 mt-5 mb-5 text-lg font-semibold text-white bg-blueSecondary rounded-md text-center w-full max-w-[650px] mx-auto">
                            Popular News
                        </h3>
                        <div class="flex flex-col gap-5 mt-3 w-full max-md:mt-10 max-md:mr-1.5 max-md:max-w-full">
                            @foreach ($popular_news_page as $popular)
                                <a href="{{ route('news.show', $popular->ID_News) }}"
                                    class="p-5 bg-white rounded-2xl border-blueThird border-t-[6px]
                            shadow-[0px_2px_20px_rgba(0,0,0,0.25)]">
                                    <div class="flex items-start gap-5">
                                        @if ($popular->News_Image)
                                            <img loading="lazy" src="{{ asset('storage/' . $popular->News_Image) }}"
                                                alt="Thumbnail for {{ $popular->News_Title }}"
                                                class="max-w-[108px] w-[108px] aspect-[1.12] rounded-lg" />
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
                                    <p class="text-sm text-black mt-3 break-words">
                                        {{ Str::limit(html_entity_decode(strip_tags($popular->News_Content)), 200) }}
                                    </p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
