@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
    <section class="flex flex-col">
        <div class="flex flex-col items-start px-16 py-28 w-full bg-blueSecondary shadow-lg max-md:px-5 max-md:py-24 max-md:max-w-full">
            <h2 class="text-5xl font-bold leading-10 text-white max-md:ml-2.5 text-start">
                Recommendation <br /> Program
            </h2>
            <div class="grid grid-cols-5 gap-5 mt-12 mb-0 max-md:grid-cols-2 max-sm:grid-cols-1 w-full">
                @foreach ($recommendedPrograms as $program)
                    <article class="flex flex-col md:flex-row bg-zinc-300 shadow-lg w-auto h-auto md:h-72 rounded-lg">
                        <img loading="lazy" src="{{ asset('storage/' . $program->program_Image) }}"
                            alt="{{ $program->program_Name }}"
                            class="object-cover w-auto md:w-32 h-72 max-w-full aspect-[0.46] md:aspect-auto rounded-lg" />

                        <div class="flex flex-col my-auto py-3 w-full md:w-[calc(100%-130px)] overflow-hidden">
                            <div class="flex flex-col px-2">
                                <h3 class="text-base font-semibold leading-4 text-black">{{ $program->program_Name }}</h3>
                                <p class="mt-3 text-[8px] leading-relaxed text-stone-500 max-w-full break-words line-clamp-3">
                                    {{ Str::limit(html_entity_decode(strip_tags($program->program_description)), 25, '...') }}
                                </p>
                            </div>
                            <div class="flex flex-col items-start py-2 px-2 mt-4 text-[8px] leading-none text-white bg-blueSecondary w-full">
                                <p>Lokasi: {{ $program->Country_of_Execution }}</p>
                                <p class="mt-1">Tanggal: {{ $program->Execution_Date }}</p>
                                <p class="mt-1">Peserta: {{ $program->Participants_Count }} Orang</p>
                            </div>
                            <a href="{{ route('InternationalExposure.show', $program->ID_program) }}" class="self-start mt-10 pl-2 text-xs font-semibold leading-none text-red-700">
                                Details &rarr;
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="flex flex-col mx-16 my-16">
        <div class="max-md:mr-2.5 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col w-[60%] max-md:ml-0 max-md:w-full">
                    @foreach ($allPrograms as $program)
                        <div class="flex flex-col max-w-[660px] mt-6 max-md:mt-6 max-md:max-w-full">
                            <img src="{{ asset('storage/' . $program->program_Image) }}" alt="{{ $program->program_Name }}"
                                class="object-cover mr-4 w-full max-w-[660px] max-h-[300px] rounded-lg h-auto max-md:mr-2.5 max-md:max-w-full" />
                            <h2 class="mt-6 text-4xl leading-10 text-stone-900 max-md:mr-2.5 max-md:max-w-full">
                                {{ $program->program_Name }}</h2>
                            <h3
                                class="py-2.5 mt-3.5 text-sm leading-4 text-stone-500 max-md:mr-2.5 max-md:max-w-full break-words line-clamp-3">
                                {{ Str::limit(html_entity_decode(strip_tags($program->program_description)), 200) }}</h3>
                            <div class="flex mt-3 mr-2.5">
                                <div
                                    class="flex justify-start items-center shrink-0 bg-bluePrimary h-16 w-56 rounded-sm text-white">
                                    <div class="flex flex-col w-full ps-3">
                                        <div class="flex">
                                            <p class="text-sm leading-4 text-white w-20">
                                                Lokasi
                                            </p>
                                            <p class="text-sm leading-4 text-white">
                                                : {{ $program->Country_of_Execution }}
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <p class="text-sm leading-4 text-white w-20">
                                                Tanggal
                                            </p>
                                            <p class="text-sm leading-4 text-white">
                                                : {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M, Y') }}
                                            </p>
                                        </div>
                                        <div class="flex">
                                            <p class="text-sm leading-4 text-white w-20">
                                                Peserta
                                            </p>
                                            <p class="text-sm leading-4 text-white">
                                                : {{ $program->Participants_Count }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('InternationalExposure.show', $program->ID_program) }}" class="z-10 self-end -mt-1.5 ml-auto text-sm leading-none text-red-700">
                                    Detail &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                    @if ($allPrograms->count() >= 5)
                        <div class="mt-6">
                            {{ $allPrograms->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>
                <div class="flex flex-col w-[40%] max-md:ml-0 max-md:w-full">
                    <h2
                        class="px-6 py-2 mt-5 mb-5 text-lg font-semibold text-white bg-indigo-950 rounded-md text-center w-full max-w-[650px] mx-auto">
                        New International Program
                    </h2>
                    <div class="flex flex-col items-center w-full max-w-[650px] mx-auto px-4">
                        @foreach ($newPrograms as $program)
                            <a href="{{ route('InternationalExposure.show', $program->ID_program) }}"
                                class="w-full max-w-[650px] mb-8 bg-white rounded-xl border-[1px] border-indigo-900 shadow-lg">
                                <div class="p-6">
                                    <h2 class="text-lg md:text-xl font-semibold text-black mb-3">
                                        {{ Str::limit($program->program_Name, 150) }}
                                    </h2>
                                    <p class="text-gray-700 text-sm md:text-base leading-relaxed line-clamp-3">
                                        {{ Str::limit(html_entity_decode(strip_tags($program->program_description)), 150, '...') }}
                                    </p>
                                    <div class="flex flex-wrap gap-4 mt-4 text-xs text-stone-900 items-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="object-contain shrink-0 w-6 h-6" viewBox="0 0 24 24" fill="currentColor">
                                                <path
                                                    d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                                </path>
                                            </svg>
                                        <time datetime="{{ $program->Execution_Date }}" class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($program->Execution_Date)->format('d M, Y') }}
                                        </time>
                                        <div class="flex items-center text-xs text-gray-500">
                                            <span class="text-xs font-medium text-blueThird">Location:</span>
                                            <span class="ml-1 text-sm">{{ $program->Country_of_Execution }}</span>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
