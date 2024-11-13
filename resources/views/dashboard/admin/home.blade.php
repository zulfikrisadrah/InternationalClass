<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <section class="flex flex-col rounded-none px-12 py-12">
        <div class="w-full max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col w-[34%] max-md:ml-0 max-md:w-full">
                    <article
                        class="flex flex-col grow py-7 w-full bg-white rounded-md shadow-2xl text-slate-700 max-md:mt-4">
                        <header class="flex flex-col px-4 w-full">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic By Years</h2>
                            <div class="flex gap-1.5 self-end text-xs leading-6">
                                <span class="flex shrink-0 my-auto w-2 h-2 bg-red-800 rounded-full"
                                    aria-hidden="true"></span>
                                <span>Avg no.</span>
                            </div>
                        </header>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/045aa81ba960046188425f184caad9d36a3edadcbf373cd413c2de8e43c111aa?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            class="object-contain self-center mt-2 max-w-full rounded-none aspect-[1.13] w-[306px]"
                            alt="Student statistics chart by years" />
                    </article>
                </div>
                <div class="flex flex-col ml-5 w-[66%] max-md:ml-0 max-md:w-full">
                    <article
                        class="flex flex-col py-6 mx-auto w-full bg-white rounded-md shadow-2xl max-md:mt-4 max-md:max-w-full">
                        <header class="flex flex-col pr-20 pl-8 w-full text-slate-700 max-md:px-5 max-md:max-w-full">
                            <h2 class="self-start text-lg font-medium leading-loose">Student Statistic</h2>
                            <div class="flex gap-10 self-end text-xs leading-6 whitespace-nowrap">
                                <div class="flex gap-5">
                                    <span class="flex shrink-0 my-auto w-2 h-2 bg-pink-400 rounded-full"
                                        aria-hidden="true"></span>
                                    <span>2020</span>
                                </div>
                                <div class="flex gap-5">
                                    <span class="flex shrink-0 my-auto w-2 h-2 bg-amber-400 rounded-full"
                                        aria-hidden="true"></span>
                                    <span>2021</span>
                                </div>
                                <div class="flex gap-5">
                                    <span class="flex shrink-0 my-auto w-2 h-2 bg-blue-600 rounded-full"
                                        aria-hidden="true"></span>
                                    <span>2022</span>
                                </div>
                                <div class="flex gap-5">
                                    <span class="flex shrink-0 my-auto w-2 h-2 bg-teal-400 rounded-full"
                                        aria-hidden="true"></span>
                                    <span>2023</span>
                                </div>
                            </div>
                        </header>
                        <div class="self-center mt-1.5 max-w-full w-[608px]">
                            <div class="flex gap-5 max-md:flex-col">
                                <div class="flex flex-col w-[17%] max-md:ml-0 max-md:w-full">
                                    <ul class="flex flex-col mt-1.5 text-xs leading-5 text-black">
                                        <li>Manajemen</li>
                                        <li>Akuntasi</li>
                                        <li>Ilmu Hukum</li>
                                        <li>Pendidikan Dokter</li>
                                        <li>Teknik Sipil</li>
                                        <li>T. Informatika</li>
                                        <li>Arsitektur</li>
                                        <li>T. Geologi</li>
                                        <li>Ilmu Hubungan International</li>
                                        <li>Ilmu Komunikasi</li>
                                        <li>Pend. Dokter Gigi</li>
                                        <li>Kesehatan Masyrakat</li>
                                        <li>Ilmu Keperawatan</li>
                                    </ul>
                                </div>
                                <div class="flex flex-col ml-5 w-[83%] max-md:ml-0 max-md:w-full">
                                    <div class="flex flex-col w-full max-md:max-w-full">
                                        <div class="flex justify-between items-center self-end">
                                            <div
                                                class="flex flex-col items-start self-stretch px-px my-auto min-h-[274px] min-w-[240px] w-[508px] max-md:max-w-full">
                                                <div class="flex items-center" role="img"
                                                    aria-label="Bar chart for student statistics">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[35px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[30px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[29px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-5 h-3.5 bg-pink-400">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[39px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[94px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-4 h-3.5 bg-teal-400">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-1.5 h-3.5 bg-pink-400">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[82px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[27px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-4 h-3.5 bg-teal-400">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[22px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[65px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[91px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[65px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[46px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[65px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[65px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[38px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[75px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-1.5 h-3.5 bg-blue-600">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[15px]">
                                                    </div>
                                                </div>
                                                <img loading="lazy"
                                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/cadcfc4a5dbdc9932174cd6eea11745e85df87c8c89e8a244fa02e53886ce587?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                                    class="object-contain mt-1.5 aspect-[6.21] w-[87px]"
                                                    alt="" />
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[118px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[17px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[26px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto w-7 h-3.5 bg-teal-400">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[31px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[65px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[38px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[17px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[99px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[37px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[77px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[30px]">
                                                    </div>
                                                </div>
                                                <div class="flex items-center mt-1.5">
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-pink-400 w-[37px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-amber-400 w-[105px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-blue-600 w-[33px]">
                                                    </div>
                                                    <div
                                                        class="flex shrink-0 self-stretch my-auto h-3.5 bg-teal-400 w-[88px]">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            class="flex flex-wrap gap-10 justify-between items-start text-xs leading-5 whitespace-nowrap text-slate-700 max-md:mr-2.5 max-md:max-w-full">
                                            <span>0</span>
                                            <span>50</span>
                                            <span>100</span>
                                            <span>150</span>
                                            <span>200</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
        <div class="mt-10 w-full max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <div class="flex flex-col w-[71%] max-md:ml-0 max-md:w-full">
                    <section
                        class="flex flex-col pt-4 pr-11 pb-20 pl-4 mx-auto w-full bg-white rounded-md shadow-2xl max-md:pr-5 max-md:mt-5 max-md:max-w-full">
                        <header class="flex flex-wrap gap-5 justify-between max-md:max-w-full">
                            <h2 class="text-lg font-medium text-zinc-800">IE Programs</h2>
                            <a href="#"
                                class="self-start mt-2.5 text-sm font-bold text-center text-blue-600">See all</a>
                        </header>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/8a4a8f4d5e1689b56a390b5e47439cb32fb8f9b9ed148e296b14aa44be4b00f3?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            class="object-contain self-center mt-10 max-w-full aspect-[2.73] w-[590px]"
                            alt="IE Programs chart" />
                    </section>
                </div>
                <div class="flex flex-col ml-5 w-[29%] max-md:ml-0 max-md:w-full">
                    <aside
                        class="flex flex-col px-7 py-6 mx-auto w-full bg-white rounded-md shadow-2xl max-md:px-5 max-md:mt-5">
                        <header class="flex gap-5 justify-between">
                            <h2 class="text-lg font-medium text-zinc-800">IE Programs</h2>
                            <a href="#" class="my-auto text-sm font-bold text-center text-blue-600">See all</a>
                        </header>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/16ce703f6c4396861be0caf7d0b677517c7928f6ba9dadcff40be4c86df3caea?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            class="object-contain mt-8 w-full aspect-[0.8] max-md:mr-0.5"
                            alt="IE Programs statistics" />
                    </aside>
                </div>
            </div>
        </div>
    </section>
</x-app-layout>
