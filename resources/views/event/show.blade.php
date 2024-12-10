@extends('layouts.main')

@section('title', 'Event - ' . $eventItem->Event_Title)

@section('content')
    <section class="flex flex-col items-center mx-8 my-16">
        <div class="w-full max-w-7xl p-4 sm:p-6 bg-white border-indigo-900 border-t-[8px] shadow-lg rounded-3xl">
            <article class="prose lg:prose-xl w-full max-w-full mx-auto">

                <!-- Gambar Berita -->
                @if ($eventItem->Event_Image)
                    <div class="relative w-full mb-8 overflow-hidden rounded-lg shadow-md">
                        <img loading="lazy" src="{{ asset('storage/' . $eventItem->Event_Image) }}"
                            alt="Featured Image for {{ $eventItem->Event_Title }}"
                            class="w-full h-auto object-cover max-h-[600px]" />
                    </div>
                @endif

                <div class="flex items-center text-zinc-500 font-light mb-4 space-x-4">
                    <time datetime="{{ $eventItem->Publication_Date }}" class="badge badge-outline">
                        {{ \Carbon\Carbon::parse($eventItem->Publication_Date)->format('F d, Y') }}
                    </time>
                </div>

                <h1 class="text-4xl sm:text-5xl font-bold text-primary mb-6">
                    {{ $eventItem->Event_Title }}
                </h1>

                <div class="mt-6 text-lg leading-relaxed text-gray-800">
                    {!! html_entity_decode($eventItem->Event_Content) !!}
                </div>

                <div class="mt-10 text-end">
                    <a href="{{ route('event.index') }}" class="btn btn-outline btn-primary">
                        Back To Event
                    </a>
                </div>
            </article>
        </div>
    </section>
@endsection
