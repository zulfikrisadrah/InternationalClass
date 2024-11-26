@extends('layouts.main')

@section('title', 'Hasanuddin University - About')

@section('content')
    <section class="flex flex-col text-xs leading-3 text-center text-white">
        <div class="flex flex-wrap gap-10 items-start px-20 pt-9 pb-3.5 w-full bg-indigo-950 max-md:px-5 max-md:max-w-full">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/cd8ae06ddf7d11ddf8bb6c8ee8d1a3cb490a427cff3e56c671d640a754a03044?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                alt="University logo" class="object-contain shrink-0 max-w-full aspect-[1.08] w-[154px]" />
            <p class="grow shrink self-stretch my-auto w-[785px] max-md:max-w-full">
                Kelas Internasional Universitas Hasanuddin adalah kampus modern, inovatif, inklusif, multikultural,
                dan berwawasan global yang mencakup berbagai disiplin ilmu. Dengan komitmen untuk mencetak lulusan yang
                berdaya saing tinggi di kancah internasional, UNHAS terus memperkuat posisinya sebagai salah satu pusat
                pendidikan unggul di kawasan Asia Tenggara dan dunia.
            </p>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/723b034c226f5e4da807c20cb3e2d0424e157b903dd222d4dc07f8dd046a94ef?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                alt="University emblem" class="object-contain shrink-0 max-w-full aspect-[1.08] w-[154px]" />
        </div>
    </section>
    <section class="flex flex-col pb-4">
        <div
            class="flex relative flex-col items-center px-20 pt-12 pb-40 w-full text-white min-h-[551px] max-md:px-5 max-md:pb-24 max-md:max-w-full">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/16b0e20c39d26f8bf35212bd6f64cf6a8aa3db76d13ec4b4a1d58e5be5e3bc5b?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                alt="" class="object-cover absolute inset-0 size-full" />
            <div class="flex relative flex-col items-center mb-0 w-full max-w-[1203px] max-md:mb-2.5 max-md:max-w-full">
                <h1 class="text-4xl">History</h1>
                <p class="self-stretch mt-14 text-lg text-center max-md:mt-10 max-md:max-w-full">
                    UNHAS International Class <br /><br />
                    Hasanuddin University International Class was established as part of UNHAS' vision to become a
                    world-class university that contributes to the development of science and technology at the global
                    level. The program was launched in 2006 in response to the increasing demand for high-quality education
                    that can compete internationally and to facilitate academic mobility for both local and foreign
                    students.
                </p>
                <a href="#" class="mt-16 text-2xl max-md:mt-10">Read More</a>
            </div>
        </div>
        <div
            class="flex gap-5 justify-between self-center my-14 ml-3 w-full max-w-[1252px] max-md:mt-10 max-md:flex-col max-md:max-w-full">
            <article class="w-1/2 max-md:w-full">
                <h2 class="text-6xl font-bold text-indigo-950 max-md:text-4xl">Visi</h2>
                <p class="text-xl text-indigo-950">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.
                </p>
            </article>
            <article class="w-1/2 max-md:w-full">
                <h2 class="text-6xl font-bold text-indigo-950 max-md:text-4xl">Misi</h2>
                <p class="text-xl text-indigo-950">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and
                    scrambled it to make a type specimen book.
                </p>
            </article>
        </div>
    </section>
    <section class="flex flex-col pb-1.5">
        <div class="pl-14 bg-neutral-200 shadow-[0px_-9px_26px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <article class="flex flex-col w-[65%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col self-stretch my-auto text-indigo-950 max-md:mt-10 max-md:max-w-full">
                        <h1 class="self-start text-6xl font-bold max-md:text-4xl">Facility</h1>
                        <p class="mt-9 text-2xl max-md:max-w-full">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                            the industry's standard dummy text ever since the 1500s
                        </p>
                        <p class="mt-4 text-2xl max-md:max-w-full">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry<br>
                            Lorem Ipsum of the printing and typesetting industry<br>
                            Lorem Ipsum typesetting industry<br>
                            Lorem Ipsum
                        </p>
                    </div>
                </article>
                <aside class="flex flex-col ml-5 w-[35%] max-md:ml-0 max-md:w-full">
                    <img loading="lazy"
                        src="https://cdn.builder.io/api/v1/image/assets/TEMP/8758809f2a6ccf667cd2aa63797e1fb528a756a6e588ae03cea7c7a465a6c2f5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                        alt="Facility image"
                        class="object-contain z-10 w-full aspect-[0.85] max-md:mt-5 max-md:-mr-2 max-md:max-w-full">
                </aside>
            </div>
        </div>
    </section>
@endsection
