@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
    {{-- <section class="flex flex-col">
        <div
            class="flex flex-col items-start px-16 py-28 w-full bg-indigo-950 shadow-[0px_10px_13px_rgba(0,0,0,0.25)] max-md:px-5 max-md:py-24 max-md:max-w-full">
            <h2 class="ml-9 text-5xl font-bold leading-10 text-white max-md:ml-2.5">
                Recommendation <br /> Program
            </h2>
            <div class="flex flex-wrap gap-5 mt-12 mb-0 max-md:mt-10 max-md:mb-2.5">
                <article class="flex bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/6dedbbb9d968b19f43113870b05c4cdc071787e276472045fdc5338b35429bc2?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="Global Internship Program in Europe"
                        class="object-contain shrink-0 max-w-full aspect-[0.46] w-[130px]" />
                    <div class="flex flex-col my-auto">
                        <div class="flex flex-col pr-4 pl-1.5">
                            <h3 class="text-sm leading-4 text-stone-900">
                                Global Internship Program di Kantor Eropa
                            </h3>
                            <p class="mt-5 text-xs leading-loose text-stone-500">
                                Tingkatkan Karir Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan
                                multikultural dan pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.
                            </p>
                        </div>
                        <div
                            class="flex flex-col items-start py-2 pr-6 pl-2 mt-6 text-xs leading-none text-white bg-indigo-950 max-md:pr-5">
                            <p>Lokasi : Paris, Berlin, Madrid</p>
                            <p class="mt-1">Durasi : 6-7 Bulan</p>
                            <p class="mt-1">Bidang : Teknologi, Bisnis, Desain</p>
                        </div>
                        <p class="mt-3 text-xs leading-none text-stone-500 max-md:mr-0.5">
                            Jadilah bagian dari jaringan global
                        </p>
                        <a href="#" class="self-start mt-12 text-xs leading-none text-red-700 max-md:mt-10">
                            Daftar ->
                        </a>
                    </div>
                </article>
                <article class="flex px-px bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/a031e11d16e85e32bd5653e751b9310315934e63c7501a1fc2f8575ac68268d5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="International Project Opportunity in Southeast Asia"
                        class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                    <div class="flex flex-col my-auto">
                        <div class="flex flex-col pl-1.5">
                            <h3 class="text-sm leading-4 text-black">
                                Kesempatan untuk Bekerja di Proyek Internasional di Asia Tenggara
                            </h3>
                            <p class="mt-1.5 text-xs leading-loose text-stone-500">
                                Bangun Pengalaman Internasional dalam Lingkungan Dinamis Dukung proyek yang memberi dampak
                                besar bagi masyarakat lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.
                            </p>
                        </div>
                        <div
                            class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-0.5">
                            <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                            <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                            <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                        </div>
                        <p class="self-start mt-3 text-xs leading-loose text-stone-500">
                            Jadilah bagian dari jaringan global
                        </p>
                        <a href="#" class="self-start mt-10 text-xs leading-none text-red-700">
                            Daftar ->
                        </a>
                    </div>
                </article>
                <article class="flex bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/d240b692b297a01d3fdc9e1824f77291ad871b8a040869d0e406849580e5cbe7?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="Exclusive Partnership Program with Technology Companies in Japan"
                        class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                    <div class="flex z-10 flex-col my-auto max-md:mr-0">
                        <h3 class="text-sm leading-4 text-stone-900">
                            Program Kemitraan Eksklusif dengan Perusahaan Teknologi di Jepang
                        </h3>
                        <p class="mt-1.5 text-xs leading-loose text-stone-500 max-md:mr-1">
                            Bangun Pengalaman Internasional dalam Lingkungan Dinamis Dukung proyek yang memberi dampak besar
                            bagi masyarakat lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.
                        </p>
                        <div
                            class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-1.5">
                            <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                            <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                            <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                        </div>
                        <div class="flex flex-col items-start pr-6 pl-1.5 mt-3 max-md:pr-5">
                            <p class="text-xs leading-loose text-stone-500">
                                Jadilah bagian dari jaringan global
                            </p>
                            <a href="#" class="mt-10 text-xs leading-none text-red-700">
                                Daftar ->
                            </a>
                        </div>
                    </div>
                </article>
                <article class="flex px-0.5 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/1c5d3b551b75590b84152a73a90abadeced97ba9771f82af29d2da85fcdefd1a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="Global Internship Program in European Offices"
                        class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                    <div class="flex flex-col my-auto">
                        <div class="flex flex-col pr-3.5 pl-1.5">
                            <h3 class="text-sm leading-4 text-stone-900">
                                Global Internship Program di Kantor Eropa
                            </h3>
                            <p class="mt-5 text-xs leading-loose text-stone-500">
                                Tingkatkan Karir Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan
                                multikultural dan pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.
                            </p>
                        </div>
                        <div
                            class="flex flex-col items-start px-1.5 py-2 mt-4 text-xs leading-none text-white bg-indigo-950">
                            <p>Lokasi : Paris, Berlin, Madrid</p>
                            <p class="mt-1">Durasi : 6-7 Bulan</p>
                            <p class="self-stretch mt-1">
                                Bidang : Teknologi, Bisnis, Desain
                            </p>
                        </div>
                        <div class="flex flex-col items-start pr-5 pl-1.5 mt-3">
                            <p class="text-xs leading-loose text-stone-500">
                                Jadilah bagian dari jaringan global
                            </p>
                            <a href="#" class="mt-9 text-xs leading-none text-red-700">
                                Daftar ->
                            </a>
                        </div>
                    </div>
                </article>
                <article class="flex px-px bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/a031e11d16e85e32bd5653e751b9310315934e63c7501a1fc2f8575ac68268d5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="Opportunity to Work on International Projects in Southeast Asia"
                        class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                    <div class="flex flex-col my-auto">
                        <div class="flex flex-col pl-1.5">
                            <h3 class="text-sm leading-4 text-stone-900">
                                Kesempatan untuk Bekerja di Proyek Internasional di Asia Tenggara
                            </h3>
                            <p class="mt-1.5 text-xs leading-loose text-stone-500">
                                Bangun Pengalaman Internasional dalam Lingkungan Dinamis Dukung proyek yang memberi dampak
                                besar bagi masyarakat lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.
                            </p>
                        </div>
                        <div
                            class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-0.5">
                            <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                            <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                            <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                        </div>
                        <div class="flex flex-col items-start pr-5 pl-1.5 mt-3 max-md:pr-5">
                            <p class="text-xs leading-loose text-stone-500">
                                Jadilah bagian dari jaringan global
                            </p>
                            <a href="#" class="mt-10 text-xs leading-none text-red-700">
                                Daftar ->
                            </a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </section> --}}
    <section class="flex flex-col">
        <div class="flex flex-col items-start px-16 py-28 w-full bg-indigo-950 shadow-[0px_10px_13px_rgba(0,0,0,0.25)] max-md:px-5 max-md:py-24 max-md:max-w-full">
            <h2 class="ml-9 text-5xl font-bold leading-10 text-white max-md:ml-2.5">
                Recommendation <br /> Program
            </h2>
            <div class="flex gap-5 mt-12 mb-0 max-md:flex-col max-md:mt-10 max-md:mb-2.5 overflow-x-auto">
                <!-- Article 1 -->
                <article class="flex bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)] w-[280px] max-w-[280px] flex-grow-0">
                    <img loading="lazy"
                         src="https://cdn.builder.io/api/v1/image/assets/TEMP/6dedbbb9d968b19f43113870b05c4cdc071787e276472045fdc5338b35429bc2?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                         alt="Global Internship Program in Europe"
                         class="object-contain shrink-0 w-[130px] max-w-full aspect-[0.46]" />
                    <div class="flex flex-col my-auto px-3">
                        <div class="flex flex-col pr-2">
                            <h3 class="text-sm leading-4 text-stone-900">Global Internship Program di Kantor Eropa</h3>
                            <p class="mt-3 text-xs leading-loose text-stone-500">
                                Tingkatkan Karir Anda di Pusat Inovasi Dunia. Dapatkan pengalaman langsung di lingkungan multikultural dan pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.
                            </p>
                        </div>
                        <div class="flex flex-col items-start py-2 px-2 mt-4 text-xs leading-none text-white bg-bluePrimary">
                            <p>Lokasi: Paris, Berlin, Madrid</p>
                            <p class="mt-1">Durasi: 6-7 Bulan</p>
                            <p class="mt-1">Bidang: Teknologi, Bisnis, Desain</p>
                        </div>
                        <p class="mt-3 text-xs leading-none text-stone-500">Jadilah bagian dari jaringan global</p>
                        <a href="#" class="self-start mt-5 text-xs leading-none text-red-700">Daftar -></a>
                    </div>
                </article>

            </div>
        </div>
    </section>



    <section class="flex flex-col">
        <nav class="flex flex-wrap gap-5 justify-between text-4xl leading-none text-white max-md:max-w-full">
            <a href="#all-programs" class="px-16 py-2 bg-indigo-950 max-md:px-5 max-md:max-w-full">All Program</a>
            <a href="#popular-programs"
                class="px-16 py-2 whitespace-nowrap bg-indigo-950 max-md:px-5 max-md:max-w-full">Popular</a>
        </nav>
        <div class="mt-6 max-md:mr-2.5 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <main class="flex flex-col w-[61%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0ce7250ccaa9fa7479cb0a99020a55a60fc6b0b701605cfd88a0ebe1986d160?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Global Internship Program in Europe"
                            class="object-contain mr-4 w-full aspect-[2.4] max-md:mr-2.5 max-md:max-w-full" />
                        <h2 class="mt-6 text-4xl leading-10 text-stone-900 max-md:mr-2.5 max-md:max-w-full">Global
                            Internship Program di Kantor Eropa</h2>
                        <p class="mt-3.5 text-sm leading-4 text-stone-500 max-md:mr-2.5 max-md:max-w-full">Tingkatkan Karir
                            Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan
                            pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                        <div class="flex mt-3 mr-2.5">
                            <div class="flex shrink-0 bg-indigo-950 h-[61px] w-[233px]"></div>
                            <div class="flex flex-col grow shrink-0 self-start mt-2.5 basis-0 w-fit max-md:max-w-full">
                                <p class="text-sm leading-4 text-white max-md:max-w-full">
                                    Lokasi : Paris, Berlin. Madrid<br />
                                    Durasi : 6-7 Bulan<br />
                                    Bidang : Teknologi, Bisnis, Desain
                                </p>
                                <a href="#apply"
                                    class="z-10 self-end -mt-1.5 mr-6 text-sm leading-none text-red-700 max-md:mr-2.5">Daftar
                                    -&gt;</a>
                            </div>
                        </div>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f16f94f41fbb553ee72d4c6c7fbea23c4adf42b0eb5996af6ead5a8e584c6b58?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="International Project Opportunity in Southeast Asia"
                            class="object-contain mt-8 mr-4 w-full aspect-[2.4] max-md:mr-2.5 max-md:max-w-full" />
                        <h2 class="mt-6 mr-3 text-4xl leading-10 text-stone-900 max-md:mr-2.5 max-md:max-w-full">Kesempatan
                            untuk Bekerja di Proyek Internasional di Asia Tenggara</h2>
                        <p class="mt-3.5 mr-3 text-sm leading-4 text-stone-500 max-md:mr-2.5 max-md:max-w-full">Tingkatkan
                            Karir Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan
                            pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                        <div class="flex items-start mt-3 mr-3 max-md:mr-2.5">
                            <div class="flex shrink-0 bg-indigo-950 h-[61px] w-[233px]"></div>
                            <div class="flex flex-col grow shrink-0 mt-2.5 basis-0 w-fit max-md:max-w-full">
                                <p class="text-sm leading-4 text-white max-md:max-w-full">
                                    Lokasi : Paris, Berlin. Madrid<br />
                                    Durasi : 6-7 Bulan<br />
                                    Bidang : Manajemen, Projek, Keu...
                                </p>
                                <a href="#apply"
                                    class="self-end mr-5 text-sm leading-none text-red-700 max-md:mr-2.5">Daftar -&gt;</a>
                            </div>
                        </div>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1cacd3225f3f00878adebdcf4bc0062e89372ee2c87525db5ea4da633cf5d638?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Exclusive Partnership Program with Technology Companies in Japan"
                            class="object-contain mt-9 mr-5 w-full aspect-[2.4] max-md:mr-2.5 max-md:max-w-full" />
                        <h2 class="mt-4 text-4xl leading-10 text-stone-900 max-md:mr-2.5 max-md:max-w-full">Program
                            Kemitraan Eksklusif dengan Perusahaan Teknologi di Jepang</h2>
                        <p class="mt-4 mr-3.5 text-sm leading-4 text-stone-500 max-md:mr-2.5 max-md:max-w-full">Tingkatkan
                            Karir Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan
                            pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                        <div class="flex mt-4 max-md:mr-2.5">
                            <div class="flex shrink-0 bg-indigo-950 h-[61px] w-[233px]"></div>
                            <div class="flex flex-col grow shrink-0 self-start mt-2.5 basis-0 w-fit max-md:max-w-full">
                                <p class="text-sm leading-4 text-white max-md:max-w-full">
                                    Lokasi : Paris, Berlin. Madrid<br />
                                    Durasi : 6-7 Bulan<br />
                                    Bidang : Manajemen, Projek, Keu...
                                </p>
                                <a href="#apply"
                                    class="z-10 self-end -mt-1.5 text-sm leading-none text-red-700 max-md:mr-2.5">Daftar
                                    -&gt;</a>
                            </div>
                        </div>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/b0ce7250ccaa9fa7479cb0a99020a55a60fc6b0b701605cfd88a0ebe1986d160?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Global Internship Program in Europe"
                            class="object-contain mt-14 ml-4 w-full aspect-[2.4] max-md:mt-10 max-md:mr-1.5 max-md:max-w-full" />
                        <h2 class="mt-6 ml-3.5 text-4xl leading-10 text-stone-900 max-md:max-w-full">Global Internship
                            Program di Kantor Eropa</h2>
                        <p class="mt-3.5 ml-4 text-sm leading-4 text-stone-500 max-md:max-w-full">Tingkatkan Karir Anda di
                            Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan pelajari
                            praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                        <div class="flex mt-3 ml-3.5">
                            <div class="flex shrink-0 bg-indigo-950 h-[61px] w-[233px]"></div>
                            <div class="flex flex-col grow shrink-0 self-start mt-2.5 basis-0 w-fit max-md:max-w-full">
                                <p class="text-sm leading-4 text-white max-md:max-w-full">
                                    Lokasi : Paris, Berlin. Madrid<br />
                                    Durasi : 6-7 Bulan<br />
                                    Bidang : Teknologi, Bisnis, Desain
                                </p>
                                <a href="#apply"
                                    class="z-10 self-end -mt-1.5 mr-6 text-sm leading-none text-red-700 max-md:mr-2.5">Daftar
                                    -&gt;</a>
                            </div>
                        </div>
                        <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/f16f94f41fbb553ee72d4c6c7fbea23c4adf42b0eb5996af6ead5a8e584c6b58?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="International Project Opportunity in Southeast Asia"
                            class="object-contain mt-8 ml-3.5 w-full aspect-[2.4] max-md:mr-2 max-md:max-w-full" />
                        <h2 class="mt-6 ml-3 text-4xl leading-10 text-stone-900 max-md:mr-0.5 max-md:max-w-full">Kesempatan
                            untuk Bekerja di Proyek Internasional di Asia Tenggara</h2>
                        <p class="mt-3.5 ml-3.5 text-sm leading-4 text-stone-500 max-md:mr-0.5 max-md:max-w-full">
                            Tingkatkan Karir Anda di Pusat Inovasi Dunia Dapatkan pengalaman langsung di lingkungan
                            multikultural dan pelajari praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                        <div class="flex items-start mt-3 ml-3 max-md:mr-1">
                            <div class="flex shrink-0 bg-indigo-950 h-[61px] w-[233px]"></div>
                            <div class="flex flex-col grow shrink-0 mt-2.5 basis-0 w-fit max-md:max-w-full">
                                <p class="text-sm leading-4 text-white max-md:max-w-full">
                                    Lokasi : Paris, Berlin. Madrid<br />
                                    Durasi : 6-7 Bulan<br />
                                    Bidang : Manajemen, Projek, Keu...
                                </p>
                                <a href="#apply"
                                    class="self-end mr-5 text-sm leading-none text-red-700 max-md:mr-2.5">Daftar -&gt;</a>
                            </div>
                        </div>
                        <nav class="self-center mt-24 text-5xl font-semibold text-black max-md:mt-10"
                            aria-label="Pagination">
                            <a href="#prev" class="sr-only">Previous</a>
                            <span>&lt;</span>
                            <a href="#next" class="sr-only">Next</a>
                            <span>&gt;</span>
                        </nav>
                    </div>
                </main>
                <aside class="flex flex-col ml-5 w-[39%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col items-start mt-4 w-full max-md:mt-10 max-md:max-w-full">
                        <article class="flex ml-3 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)] max-md:ml-2.5">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1c5d3b551b75590b84152a73a90abadeced97ba9771f82af29d2da85fcdefd1a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="Global Internship Program in Europe"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex flex-col my-auto">
                                <div class="flex flex-col pr-3.5 pl-1.5">
                                    <h3 class="text-sm leading-4 text-stone-900">Global Internship Program di Kantor Eropa
                                    </h3>
                                    <p class="mt-5 text-xs leading-loose text-stone-500">Tingkatkan Karir Anda di Pusat
                                        Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan pelajari
                                        praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                                </div>
                                <div
                                    class="flex flex-col items-start px-1.5 py-2 mt-4 text-xs leading-none text-white bg-indigo-950">
                                    <p>Lokasi : Paris, Berlin, Madrid</p>
                                    <p class="mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="self-stretch mt-1">Bidang : Teknologi, Bisnis, Desain</p>
                                </div>
                                <p class="self-start mt-3 text-xs leading-loose text-stone-500">Jadilah bagian dari
                                    jaringan global</p>
                                <a href="#apply" class="self-start mt-10 text-xs leading-none text-red-700">Daftar
                                    -&gt;</a>
                            </div>
                        </article>
                        <article class="flex mt-9 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)] max-md:ml-1">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a031e11d16e85e32bd5653e751b9310315934e63c7501a1fc2f8575ac68268d5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="International Project Opportunity in Southeast Asia"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex z-10 flex-col my-auto max-md:-mr-0.5">
                                <div class="flex flex-col pl-1.5">
                                    <h3 class="text-sm leading-4 text-stone-900">Kesempatan untuk Bekerja di Proyek
                                        Internasional di Asia Tenggara</h3>
                                    <p class="mt-1.5 text-xs leading-loose text-stone-500">Bangun Pengalaman Internasional
                                        dalam Lingkungan Dinamis Dukung proyek yang memberi dampak besar bagi masyarakat
                                        lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.</p>
                                </div>
                                <div
                                    class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-0.5">
                                    <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                                    <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                                </div>
                                <p class="self-start mt-3 text-xs leading-loose text-stone-500">Jadilah bagian dari
                                    jaringan global</p>
                                <a href="#apply" class="self-start mt-10 text-xs leading-none text-red-700">Daftar
                                    -&gt;</a>
                            </div>
                        </article>
                        <article class="flex mt-10 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d240b692b297a01d3fdc9e1824f77291ad871b8a040869d0e406849580e5cbe7?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="Exclusive Partnership Program with Technology Companies in Japan"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex z-10 flex-col my-auto max-md:mr-0">
                                <h3 class="text-sm leading-4 text-stone-900">Program Kemitraan Eksklusif dengan Perusahaan
                                    Teknologi di Jepang</h3>
                                <p class="mt-1.5 text-xs leading-loose text-stone-500 max-md:mr-1">Bangun Pengalaman
                                    Internasional dalam Lingkungan Dinamis Dukung proyek yang memberi dampak besar bagi
                                    masyarakat lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.</p>
                                <div
                                    class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-1.5">
                                    <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                                    <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                                </div>
                                <div class="flex flex-col items-start pr-6 pl-1.5 mt-3 max-md:pr-5">
                                    <p class="text-xs leading-loose text-stone-500">Jadilah bagian dari jaringan global</p>
                                    <a href="#apply" class="mt-10 text-xs leading-none text-red-700">Daftar -&gt;</a>
                                </div>
                            </div>
                        </article>
                        <h2
                            class="self-stretch px-16 py-2 mt-24 text-4xl leading-none text-white bg-indigo-950 max-md:px-5 max-md:mt-10 max-md:max-w-full">
                            Upcoming Event</h2>
                        <article
                            class="flex mt-12 ml-3 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)] max-md:mt-10 max-md:ml-2.5">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/1c5d3b551b75590b84152a73a90abadeced97ba9771f82af29d2da85fcdefd1a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="Global Internship Program in Europe"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex flex-col my-auto">
                                <div class="flex flex-col pr-3.5 pl-1.5">
                                    <h3 class="text-sm leading-4 text-stone-900">Global Internship Program di Kantor Eropa
                                    </h3>
                                    <p class="mt-5 text-xs leading-loose text-stone-500">Tingkatkan Karir Anda di Pusat
                                        Inovasi Dunia Dapatkan pengalaman langsung di lingkungan multikultural dan pelajari
                                        praktik terbaik dari para ahli industri terkemuka di Eropa.</p>
                                </div>
                                <div
                                    class="flex flex-col items-start px-1.5 py-2 mt-4 text-xs leading-none text-white bg-indigo-950">
                                    <p>Lokasi : Paris, Berlin, Madrid</p>
                                    <p class="mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="self-stretch mt-1">Bidang : Teknologi, Bisnis, Desain</p>
                                </div>
                                <p class="self-start mt-3 text-xs leading-loose text-stone-500">Jadilah bagian dari
                                    jaringan global</p>
                                <a href="#apply" class="self-start mt-10 text-xs leading-none text-red-700">Daftar
                                    -&gt;</a>
                            </div>
                        </article>
                        <article class="flex mt-9 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)] max-md:ml-1">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/a031e11d16e85e32bd5653e751b9310315934e63c7501a1fc2f8575ac68268d5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="International Project Opportunity in Southeast Asia"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex z-10 flex-col my-auto max-md:-mr-0.5">
                                <div class="flex flex-col pl-1.5">
                                    <h3 class="text-sm leading-4 text-stone-900">Kesempatan untuk Bekerja di Proyek
                                        Internasional di Asia Tenggara</h3>
                                    <p class="mt-1.5 text-xs leading-loose text-stone-500">Bangun Pengalaman Internasional
                                        dalam Lingkungan Dinamis Dukung proyek yang memberi dampak besar bagi masyarakat
                                        lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.</p>
                                </div>
                                <div
                                    class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-0.5">
                                    <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                                    <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                                </div>
                                <p class="self-start mt-3 text-xs leading-loose text-stone-500">Jadilah bagian dari
                                    jaringan global</p>
                                <a href="#apply" class="self-start mt-10 text-xs leading-none text-red-700">Daftar
                                    -&gt;</a>
                            </div>
                        </article>
                        <article class="flex mt-10 bg-zinc-300 shadow-[3px_4px_17px_rgba(0,0,0,0.25)]">
                            <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/d240b692b297a01d3fdc9e1824f77291ad871b8a040869d0e406849580e5cbe7?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                alt="Exclusive Partnership Program with Technology Companies in Japan"
                                class="object-contain shrink-0 w-28 max-w-full aspect-[0.39]" />
                            <div class="flex z-10 flex-col my-auto max-md:mr-0">
                                <h3 class="text-sm leading-4 text-stone-900">Program Kemitraan Eksklusif dengan Perusahaan
                                    Teknologi di Jepang</h3>
                                <p class="mt-1.5 text-xs leading-loose text-stone-500 max-md:mr-1">Bangun Pengalaman
                                    Internasional dalam Lingkungan Dinamis Dukung proyek yang memberi dampak besar bagi
                                    masyarakat lokal sambil memperluas wawasan Anda di wilayah yang berkembang pesat.</p>
                                <div
                                    class="flex flex-col py-2 pr-px pl-1.5 mt-2.5 text-xs leading-none text-white bg-indigo-950 max-md:mr-1.5">
                                    <p>Lokasi : Jakarta, Kuala Lumpur, B...</p>
                                    <p class="self-start mt-1">Durasi : 6-7 Bulan</p>
                                    <p class="mt-1">Bidang : Manajemen Projek, Keu...</p>
                                </div>
                                <div class="flex flex-col items-start pr-6 pl-1.5 mt-3 max-md:pr-5">
                                    <p class="text-xs leading-loose text-stone-500">Jadilah bagian dari jaringan global</p>
                                    <a href="#apply" class="mt-10 text-xs leading-none text-red-700">Daftar -&gt;</a>
                                </div>
                            </div>
                        </article>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
