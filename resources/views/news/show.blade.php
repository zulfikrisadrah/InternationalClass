@extends('layouts.main')

@section('title', 'News - ' . $newsItem->News_Title)

@section('content')
    <section class="flex flex-col items-center mx-8 my-16">
        <div class="w-full max-w-7xl p-4 sm:p-6 bg-white shadow-lg rounded-lg">
            <article class="prose lg:prose-xl w-full max-w-full mx-auto">

                <!-- Gambar Berita -->
                @if ($newsItem->News_Image)
                    <div class="relative w-full mb-8 overflow-hidden rounded-lg shadow-md">
                        <img loading="lazy" src="{{ asset('storage/' . $newsItem->News_Image) }}"
                            alt="Featured Image for {{ $newsItem->News_Title }}"
                            class="w-full h-auto object-cover max-h-[600px]" />
                    </div>
                @endif

                <div class="flex items-center text-zinc-500 font-light mb-4 space-x-4">
                    <time datetime="{{ $newsItem->Publication_Date }}" class="badge badge-outline">
                        {{ \Carbon\Carbon::parse($newsItem->Publication_Date)->format('F d, Y') }}
                    </time>
                </div>

                <h1 class="text-4xl sm:text-5xl font-bold text-primary mb-6">
                    {{ $newsItem->News_Title }}
                </h1>

                <!-- Tambahkan Tanggal Event -->
                @if ($newsItem->Event_Date)
                    <div class="flex items-center text-zinc-500 font-light mb-4 space-x-4">
                        <span class="badge badge-outline">
                            Event Date: {{ \Carbon\Carbon::parse($newsItem->Event_Date)->format('F d, Y') }}
                        </span>
                    </div>
                @endif

                <div class="mt-6 text-lg leading-relaxed text-gray-800 break-words">
                    {!! nl2br(html_entity_decode($newsItem->News_Content)) !!}
                </div>

                <div class="mt-10 text-end">
                    <a href="{{ route('news.index') }}" class="btn btn-outline btn-primary">
                        Back To News
                    </a>
                </div>
            </article>
        </div>
    </section>
@endsection
