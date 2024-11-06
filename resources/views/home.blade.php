<!-- resources/views/home.blade.php -->
@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
<!-- Content Section -->
<main class="pt-12 bg-white">
<section class="mx-[70px]">
    <div class="flex flex-wrap lg:flex-nowrap gap-5">
        <!-- Image Column -->
        <div class="w-full lg:w-5/12">
            <img src="images/imageAbout.png"
                 class="w-full rounded-lg object-contain"
                 style="aspect-ratio: 1.52;"
                 alt="About us illustration" />
        </div>

        <!-- Text Column -->
        <div class="w-full lg:w-7/12">
            <h2 class="text-6xl font-bold text-bluePrimary pb-12">About</h2>
            <p class="text-black mt-32 lg:mt-0">
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
            </p>
        </div>
    </div>
</section>


        <!-- International Exposure Program Section -->
<section class="mx-[70px]">
        <h2 class="text-bluePrimary text-3xl font-semibold mt-12">International Exposure Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mt-6">
            <div class="bg-redThird text-center p-6 rounded-[25px] h-auto w-auto">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/df0b7c0c0020c3ae5a554e58ab907641b00d2291f195b9b5ca7128338c5f4ffd" alt="Sit In Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Sit In Program</h3>
            </div>
            <div class="bg-bluePrimary text-center p-6 rounded-[25px] h-auto w-auto">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/47e6af7cc8fadc5828c8244b462f1a80a0aea738074ed752ec91776733d45173" alt="Internship Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Internship Program</h3>
            </div>
            <div class="bg-redThird text-center p-6 rounded-[25px] h-auto w-auto">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0506d877ca2e563c8f523a082e12915878ea2d34b9cff913bd70cfbc47abfe45" alt="Short Course" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Short Course</h3>
            </div>
            <div class="bg-bluePrimary text-center p-6 rounded-[25px] h-auto w-auto">
                <img src="https://cdn.builder.io/api/v1/image/assets/TEMP/0a91bf3fedbda6671bdbc280e33e3d35f2a01d8a849f89fdf9954da5a5486943" alt="Enrichment Program" class="w-16 mx-auto">
                <h3 class="mt-4 font-semibold text-white">Enrichment Program</h3>
            </div>
        </div>
        <p class="text-black mt-6 text-lg">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean tristique, tortor nec consequat vulputate.</p>
        <ul class="text-black list-disc pl-6 mt-4">
            <li>Student Exchange Program</li>
            <li>Sit In Program</li>
            <li>Summer Course</li>
            <li>Enrichment Program</li>
        </ul>
</section>
<section class="mx-[70px] my-12">
        <!-- Study Program Section -->
        <h2 class="text-bluePrimary text-3xl font-bold mt-12">Study Program</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            <!-- Program Cards -->
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
            <div class="card bg-bluePrimary text-white w-auto shadow-lg">
                <figure>
                    <img src="images/fkg.jpg" alt="S1 Pendidikan Dokter">
                </figure>
                <div class="card-body">
                    <h3 class="mt-2 text-lg font-semibold">S1 Pendidikan Dokter</h3>
                    <p class="text-sm">Fakultas Kedokteran</p>
                </div>
            </div>
        </div>
</section>

        <!-- News and Events Section -->
<section class="flex overflow-hidden flex-col py-12 bg-gray-200">
<div class="container mx-auto">
    <div class="flex flex-col items-start mx-[70px] pt-9 pb-24 ">
        <h2 class="self-center text-5xl font-bold text-center text-stone-900 max-md:text-4xl">
            News and <span class="text-stone-900">Events</span>
        </h2>
        <div class="flex flex-wrap gap-5 justify-between mt-24 w-full text-center max-md:mt-10 max-md:max-w-full">
            <h2 class="text-black text-3xl font-semibold ps-4">Latest Event</h2>
            <div class="flex gap-10">
            <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5">View all</button>
            <h2 class="text-black text-3xl font-semibold ps-4">Upcoming Events</h2>
            </div>
            <button class="btn btn-info px-6 py-2.5 text-white rounded-[100px] max-md:px-5">View all</button>
        </div>
        <div class="mt-7 w-full max-w-[1246px] max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
            <div class="flex flex-col w-[56%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col w-full max-md:mt-10 max-md:max-w-full">
                <div class="flex flex-wrap gap-6 justify-center items-center text-xs text-black">
                    <article class="flex flex-col self-stretch my-auto w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                        <div class="flex flex-col pr-1.5 pl-2.5">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                    <article class="flex flex-col self-stretch my-auto w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f2c5af1fb96f55f96d9cfbf0a7ca4a5b261d7f5a0e225cdc7bb08d832908c9fd?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                        <div class="flex flex-col pr-1.5 pl-2.5">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                    <article class="flex flex-col self-stretch my-auto w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4d2fa6b6b3a8748bcf9e428401b344fa677101651eff90decfc368fe7dce518a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                        <div class="flex flex-col pr-1.5 pl-2.5">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                </div>
                <div class="flex flex-wrap gap-6 justify-center items-center mt-6">
                    <article class="flex flex-col self-stretch my-auto w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <div class="flex relative flex-col aspect-[1.695] w-[200px]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/7c7f1b1279f59f1a0df39b93f91aa64eb396ae076b53da329ddb7e8e2c45213e?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="Background image" class="object-cover absolute inset-0 size-full" />
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/4d2fa6b6b3a8748bcf9e428401b344fa677101651eff90decfc368fe7dce518a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="Foreground image" class="object-contain w-full aspect-[1.69]" />
                        </div>
                        <div class="flex flex-col pr-1.5 pl-2.5 text-xs text-black">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                    <article class="flex flex-col self-stretch my-auto text-xs text-black w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                        <div class="flex flex-col pr-1.5 pl-2.5">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                    <article class="flex flex-col self-stretch my-auto text-xs text-black w-[200px]">
                    <div class="flex flex-col pb-1.5 bg-white shadow-[2px_2px_10px_rgba(0,0,0,0.25)]">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/aa842f41a05af1ed43e7673b4319d32ccdaba43e965b9520bc1f4ce390add765?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="News article image" class="object-contain aspect-[1.69] w-[200px]" />
                        <div class="flex flex-col pr-1.5 pl-2.5">
                        <time datetime="2024-05-13" class="self-start text-xs font-light text-neutral-200">May 13, 2024</time>
                        <h4 class="mt-3 text-xs font-semibold max-md:mr-1">Prof. Dr. Saeed Ahmad Buzdar along with the facullty...</h4>
                        <p class="mt-2">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#" class="self-center px-5 py-2 mt-12 max-w-full text-center border border-black border-solid text-stone-900 w-[100px] max-md:px-5 max-md:mt-10">Read more</a>
                        </div>
                    </div>
                    </article>
                </div>
                </div>
            </div>
            <aside class="flex flex-col ml-5 w-[44%] max-md:ml-0 max-md:w-full">
                <div class="flex flex-col grow mt-3.5 text-sm text-black max-md:mt-10 max-md:max-w-full">
                <article class="flex flex-col items-start py-8 pr-3.5 pl-7 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:max-w-full">
                    <h4 class="font-semibold text-center">Event Title</h4>
                    <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training workshop for teachers organized by Seerat Chair, IUB is starting from 13 May 2024</p>
                    <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                    <time datetime="2024-05-11">11 May, 2024</time>
                    </div>
                </article>
                <article class="flex flex-col items-start py-8 pr-3.5 pl-7 mt-20 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:mt-10 max-md:max-w-full">
                    <h4 class="font-semibold text-center">Event Title</h4>
                    <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training workshop for teachers organized by Seerat Chair, IUB is starting from 13 May 2024</p>
                    <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                    <time datetime="2024-05-11">11 May, 2024</time>
                    </div>
                </article>
                <article class="flex flex-col items-start py-8 pr-3.5 pl-7 mt-20 w-full bg-white rounded-3xl border-indigo-900 border-t-[6px] shadow-[0px_2px_10px_rgba(0,0,0,0.25)] max-md:pl-5 max-md:mt-10 max-md:max-w-full">
                    <h4 class="font-semibold text-center">Event Title</h4>
                    <p class="self-stretch mt-1 max-md:max-w-full">The second phase of the training workshop for teachers organized by Seerat Chair, IUB is starting from 13 May 2024</p>
                    <div class="flex gap-1.5 mt-4 text-xs text-stone-900">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/ffd38c1a5c945719930ffaa2f12700162a1fc1144c248ec647b7339af36c2d31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="" class="object-contain shrink-0 self-start w-5 aspect-square" />
                    <time datetime="2024-05-11">11 May, 2024</time>
                    </div>
                </article>
                </div>
            </aside>
            </div>
        </div>
    </div>
</div>
</section>

        <!-- Join Us Section -->
{{-- <section class="py-16 text-white">
    <div class="container mx-[70px]">
                <div class="flex gap-5 max-md:flex-col">
                    <div class="flex flex-col max-md:ml-0 max-md:w-full">
                        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f15eb4bfafd89d5dd2233ba2a802a4465d0eabcf155a37d7b81e7b861de6b8d2?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" alt="Registration visual" class="object-contain grow w-full aspect-auto max-md:max-w-full" />
                    </div>
                    <div class="flex flex-col ml-5 w-[42%] max-md:ml-0 max-md:w-full">
                        <div class="mt-6">
                            <div tabindex="0" class="collapse bg-primary">
                                <div class="collapse-title text-xl font-medium">Focus me to see content</div>
                                <div class="collapse-content">
                                    <p>tabindex="0" attribute is necessary to make the div focusable</p>
                                </div>
                            </div>
                            <div tabindex="o" class="collapse collapse-arrow bg-primary">
                                <input type="radio" name="my-accordion-2"  />
                                <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                                <div class="collapse-content">
                                    <p>hello</p>
                                </div>
                            </div>
                            <div tabindex="0" class="collapse collapse-arrow bg-primary">
                                <input type="radio" name="my-accordion-2" />
                                <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                                <div class="collapse-content">
                                    <p>hello</p>
                                </div>
                            </div>
                            <div tabindex="0" class="collapse collapse-arrow bg-primary">
                                <input type="radio" name="my-accordion-2" />
                                <div class="collapse-title text-xl font-medium">Click to open this one and close others</div>
                                <div class="collapse-content">
                                    <p>hello</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</section> --}}
</main>

@endsection
