@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
    <section class="flex flex-col">
        <!-- Hero Section -->
        <div
            class="flex flex-col items-start px-16 py-28 w-full bg-blueSecondary shadow-lg max-md:px-5 max-md:py-24 max-md:max-w-full">
            <h2 class="ml-9 text-5xl font-bold leading-10 text-white max-md:ml-2.5">
                Recommendation <br /> Program
            </h2>
            <div class="grid grid-cols-5 gap-5 mt-12 mb-0 max-md:grid-cols-2 max-sm:grid-cols-1">
                @foreach ($programs as $program)
                    <article class="flex bg-zinc-300 shadow-lg w-full h-[285px]">
                        <img loading="lazy" src="{{ asset('storage/' . $program->program_Image) }}"
                            alt="{{ $program->program_Name }}"
                            class="object-cover shrink-0 w-[130px] max-w-full aspect-[0.46]" />
                        <div class="flex flex-col my-auto py-3">
                            <div class="flex flex-col pl-2">
                                <h3 class="text-[13px] font-semibold leading-4 text-stone-900">{{ $program->program_Name }}
                                </h3>
                                <p class="mt-3 text-[7px] leading-relaxed text-stone-500">
                                    {{ $program->program_description }}</p>
                            </div>
                            <div
                                class="flex flex-col items-start py-2 px-2 mt-4 text-[7px] leading-none text-white bg-indigo-950">
                                <p>Lokasi: {{ $program->Country_of_Execution }}</p>
                                <p class="mt-1">Tanggal: {{ $program->Execution_Date }}</p>
                                <p class="mt-1">Peserta: {{ $program->Participants_Count }} Orang</p>
                            </div>
                            <a href=""
                                class="self-start mt-10 pl-2 text-[7px] font-semibold leading-none text-red-700">Daftar
                                &rarr;</a>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="flex flex-col mx-16 my-16">
        <!-- Navigation Bar -->
        <nav class="flex flex-wrap gap-5 justify-between text-4xl leading-none text-white max-md:max-w-full">
            <div class="text-semibold px-56 py-1 bg-bluePrimary max-md:px-5 max-md:max-w-full">All Program</div>
            <div class="text-semibold px-24 py-1 whitespace-nowrap bg-bluePrimary max-md:px-5 max-md:max-w-full">Popular
            </div>
        </nav>
        <div class="mt-6 max-md:mr-2.5 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <main class="flex flex-col w-[61%] max-md:ml-0 max-md:w-full">
                    @foreach ($programs as $program)
                        <div class="flex flex-col max-w-[660px] mt-10 max-md:mt-10 max-md:max-w-full">
                            <img src="{{ asset('storage/' . $program->program_Image) }}" alt="{{ $program->program_Name }}"
                                class="object-cover mr-4 w-full max-w-[660px] max-h-[300px] rounded-lg h-auto max-md:mr-2.5 max-md:max-w-full" />
                            <h2 class="mt-6 text-4xl leading-10 text-stone-900 max-md:mr-2.5 max-md:max-w-full">
                                {{ $program->program_Name }}</h2>
                            <h3 class="mt-3.5 text-sm leading-4 text-stone-500 max-md:mr-2.5 max-md:max-w-full">
                                {{ $program->program_description }}</h3>
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
                                                : {{ $program->Execution_Date }}
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
                                <a href="" class="z-10 self-end -mt-1.5 ml-auto text-sm leading-none text-red-700">
                                    Daftar &rarr;
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <div class="mt-6">
                        {{ $programs->appends(request()->query())->links('vendor.pagination.custom') }}
                    </div>
                </main>
            </div>
        </div>
    </section>
@endsection
