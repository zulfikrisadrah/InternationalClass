@extends('layouts.main')

@section('title', 'Hasanuddin University - About')

@section('content')
    <section class="flex flex-row text-xs leading-4 text-center text-white">
        <div class="flex flex-row gap-10 items-center px-4 pt-6 pb-3 w-full bg-bluePrimary">
            <img loading="lazy" src="{{ asset('images/logoUnhasWhite.png') }}" alt="University logo"
                class="object-contain max-w-40 w-32 md:w-40" />
            <p class="grow shrink self-stretch my-auto text-xs md:text-base lg:text-lg leading-relaxed  w-auto px-2">
                The International Class at Hasanuddin University is a modern, innovative, inclusive, multicultural, and
                globally-oriented campus that covers various fields of study. With a commitment to producing graduates with
                high competitiveness in the international arena, UNHAS continues to strengthen its position as one of the
                leading educational centers in Southeast Asia and the world.
            </p>
            <img loading="lazy" src="{{ asset('images/logoUnhasWhite.png') }}" alt="University logo"
                class="object-contain max-w-40 w-32 md:w-40" />
        </div>
    </section>
    <section class="flex flex-col pb-4 bg-neutral-200 ">
        <div class="flex relative flex-col items-center px-5 pt-12 pb-28 w-full text-white min-h-96 max-w-full">
            <img loading="lazy" src="{{ asset('images/login.png') }}" alt="Login Image"
                class="object-cover absolute inset-0 w-full h-full" />
            <div class="flex relative flex-col items-center mb-0 w-full max-w-[1203px]">
                <h1 class="text-4xl font-semibold text-center max-w-full">History</h1>
                <p class="self-stretch mt-14 text-lg text-center max-w-full mx-5 md:mt-10">
                    Hasanuddin University International Class was established as part of UNHAS's vision to become a
                    world-class university that contributes to the development of science and technology at the global
                    level. The program was launched in 2006 in response to the increasing demand for high-quality education
                    that can compete internationally and to facilitate academic mobility for both local and foreign
                    students.
                </p>
            </div>
        </div>

        <div
            class="flex gap-5 justify-between self-center my-14 ml-3 w-full max-w-[1252px] max-md:mt-10 max-md:flex-col max-md:max-w-full">
            <article class="w-1/2 max-md:w-full">
                <h2 class="text-6xl font-bold text-indigo-950 max-md:text-4xl">Vision</h2>
                <p class="text-xl text-indigo-950">
                    <br>
                    To become a center of excellence in international education, producing competent graduates who are
                    ready to compete in the global market, while leveraging the potential of the Indonesian Maritime
                    Continent.
                </p>
            </article>
            <article class="w-1/2 max-md:w-full">
                <h2 class="text-6xl font-bold text-indigo-950 max-md:text-4xl">Mission</h2>
                <p class="text-xl text-indigo-950 text-justify">
                    <br>
                    1. To provide a learning environment based on foreign languages that enhances the
                    capacity of innovative, adaptive, and globally-oriented learners.<br><br>
                    2. To establish international collaborations with universities and global institutions
                    to expand students perspectives and experiences.<br><br>
                    3. To foster the development of knowledge, skills, and expertise in students, supporting global
                    progress with a focus on the Indonesian Maritime Continent as a hub of innovation and international
                    education.
                </p>
            </article>
        </div>
    </section>
    <div class="flex flex-col text-white">
        <div class="flex relative flex-col px-20 pt-6 pb-20 w-full min-h-[453px] max-md:px-5 max-md:max-w-full">
            <img loading="lazy"
                src="{{ asset('images/bg2.png') }}"
                alt="Facility background" class="object-cover absolute inset-0 size-full" />
                <div class="flex flex-col self-stretch my-auto max-md:mt-10 max-md:max-w-full z-10">
                    <h1 class="self-start text-6xl font-semibold text-blueSecondary max-md:text-4xl">Facility</h1>
                    <p class="mt-6 text-xl text-white text-justify max-md:max-w-full">
                        The International Class at Hasanuddin University offers cutting-edge facilities that support a
                        dynamic, innovative, and globally focused learning environment. These facilities are
                        specifically designed to enhance the academic experience, promote collaboration, and foster
                        excellence in education.
                    </p>
                    <ul class="mt-6 text-xl text-white max-md:list-disc max-md:max-w-full pl-5">
                        <li>Laboratories</li>
                        <li>Library</li>
                        <li>Seminar Room</li>
                        <li>Faculty Room</li>
                        <li>International Classrooms</li>
                        <li>Evacuation Routes</li>
                    </ul>
                </div>
        </div>
    </div>
@endsection
