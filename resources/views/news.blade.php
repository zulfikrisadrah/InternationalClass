@extends('layouts.main')

@section('title', 'Hasanuddin University')

@section('content')
    <section class="flex flex-col items-start mx-[70px] my-[70px]">
        <div class="self-stretch w-full max-md:max-w-full">
            <div class="flex gap-5 max-md:flex-col">
                <article class="flex flex-col w-[55%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col grow items-start mt-5 text-xl text-black max-md:mt-10 max-md:max-w-full">
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/a08492095a0ec2c9c7a4be273276f15658311de6dd2d74aebde5a622199be18a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Article featured image"
                            class="object-contain self-stretch w-full aspect-[1.74] max-md:mr-2.5 max-md:max-w-full" />
                        <time datetime="2024-05-13" class="mt-12 font-light text-zinc-500 max-md:mt-10">May 13, 2024</time>
                        <h2 class="self-stretch text-4xl font-semibold max-md:max-w-full">Prof. Dr. Saeed Ahmad Buzdar along
                            with the facullty...</h2>
                        <p class="mt-10 max-md:max-w-full">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical
                            and Mathematical Sciences has said that the British Council project Pak UK Education....</p>
                        <a href="#"
                            class="px-12 py-2.5 mt-10 text-xs text-center border border-black border-solid text-stone-900 max-md:px-5 max-md:ml-2">Read
                            more</a>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/64bdbbbb9432815e2ec4ff0edef334621cb8fedbef505588dc03fc7e5fab5c06?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Second article featured image"
                            class="object-contain self-stretch mt-36 w-full aspect-[1.81] max-md:mt-10 max-md:mr-2.5 max-md:max-w-full" />
                        <time datetime="2024-05-13" class="mt-12 font-light text-zinc-500 max-md:mt-10">May 13, 2024</time>
                        <h2 class="self-stretch mt-2.5 text-4xl font-semibold max-md:max-w-full">Prof. Dr. Saeed Ahmad
                            Buzdar along with the facullty...</h2>
                        <p class="mt-10 max-md:max-w-full">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical
                            and Mathematical Sciences has said that the British Council project Pak UK Education</p>
                        <a href="#"
                            class="px-12 py-2.5 mt-10 text-xs text-center border border-black border-solid text-stone-900 max-md:px-5">Read
                            more</a>
                        <img loading="lazy"
                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/2183b309d031deb3b0dc3dc8cd7bc3f9c269d57c8580d12fa96b63a461e083c2?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                            alt="Third article featured image"
                            class="object-contain self-stretch mt-40 w-full aspect-[1.88] max-md:mt-10 max-md:mr-2.5 max-md:max-w-full" />
                    </div>
                </article>
                <aside class="flex flex-col ml-5 w-[45%] max-md:ml-0 max-md:w-full">
                    <div class="flex flex-col max-md:mt-10 max-md:max-w-full">
                        <h3
                            class="px-16 py-3 ml-3 text-xl font-semibold text-white whitespace-nowrap bg-indigo-950 max-md:px-5 max-md:max-w-full">
                            Popular</h3>
                        <div
                            class="flex flex-col px-7 pt-8 pb-16 mt-14 w-full bg-zinc-300 max-md:px-5 max-md:mt-10 max-md:mr-1.5 max-md:max-w-full">
                            <div class="flex flex-wrap gap-5 items-start">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/77a3cbd93a2bb1d9dc6efe6c550f1baac2670b19f7e5bdba08af171c8fe0a38b?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                    alt="Thumbnail for popular article"
                                    class="object-contain shrink-0 max-w-full aspect-[1.12] w-[108px]" />
                                <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                                    <time datetime="2024-05-13" class="self-start text-base font-light text-zinc-500">May
                                        13, 2024</time>
                                    <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar along
                                        with the facullty...</h4>
                                </div>
                            </div>
                            <p class="mt-3.5 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                        <div
                            class="flex flex-col px-7 pt-8 pb-14 mt-10 w-full bg-zinc-300 max-md:px-5 max-md:mr-1.5 max-md:max-w-full">
                            <div class="max-md:max-w-full">
                                <div class="flex gap-5 max-md:flex-col">
                                    <div class="flex flex-col w-[22%] max-md:ml-0 max-md:w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb5984827e1ea4085a13162d97b7b979df24750dbcef0981a48b29a5e29881c7?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="Thumbnail for second popular article"
                                            class="object-contain grow shrink-0 max-w-full aspect-[1.08] w-[108px] max-md:mt-5" />
                                    </div>
                                    <div class="flex flex-col ml-5 w-[78%] max-md:ml-0 max-md:w-full">
                                        <div class="flex flex-col mt-1 max-md:mt-6">
                                            <time datetime="2024-05-13"
                                                class="self-start text-base font-light text-zinc-500">May 13, 2024</time>
                                            <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar
                                                along with the facullty...</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-4 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                        <div
                            class="flex flex-col px-7 pt-8 pb-14 mt-10 w-full bg-zinc-300 max-md:px-5 max-md:mr-1.5 max-md:max-w-full">
                            <div class="flex flex-wrap gap-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/8ad1fef5b460ea8e56d6c12ed47f33fa30ec9f8d01716263a913ca780622c972?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                    alt="Thumbnail for third popular article"
                                    class="object-contain shrink-0 max-w-full aspect-[1.11] w-[108px]" />
                                <div class="flex flex-col grow shrink-0 my-auto basis-0 w-fit">
                                    <time datetime="2024-05-13" class="self-start text-base font-light text-zinc-500">May
                                        13, 2024</time>
                                    <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar along
                                        with the facullty...</h4>
                                </div>
                            </div>
                            <p class="mt-5 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                        <div
                            class="flex flex-col px-7 pt-8 pb-16 mt-10 w-full bg-zinc-300 max-md:px-5 max-md:mr-1.5 max-md:max-w-full">
                            <div class="flex flex-wrap gap-5">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/77a3cbd93a2bb1d9dc6efe6c550f1baac2670b19f7e5bdba08af171c8fe0a38b?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                    alt="Thumbnail for fourth popular article"
                                    class="object-contain shrink-0 max-w-full aspect-[1.12] w-[108px]" />
                                <div class="flex flex-col grow shrink-0 self-start basis-0 w-fit">
                                    <time datetime="2024-05-13" class="self-start text-base font-light text-zinc-500">May
                                        13, 2024</time>
                                    <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar along
                                        with the facullty...</h4>
                                </div>
                            </div>
                            <p class="mt-4 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                        <div
                            class="flex flex-col px-7 pt-8 pb-16 mt-10 w-full bg-zinc-300 max-md:px-5 max-md:mr-1.5 max-md:max-w-full">
                            <div class="max-md:max-w-full">
                                <div class="flex gap-5 max-md:flex-col">
                                    <div class="flex flex-col w-[22%] max-md:ml-0 max-md:w-full">
                                        <img loading="lazy"
                                            src="https://cdn.builder.io/api/v1/image/assets/TEMP/bb5984827e1ea4085a13162d97b7b979df24750dbcef0981a48b29a5e29881c7?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                            alt="Thumbnail for fifth popular article"
                                            class="object-contain grow shrink-0 max-w-full aspect-[1.08] w-[108px] max-md:mt-5" />
                                    </div>
                                    <div class="flex flex-col ml-5 w-[78%] max-md:ml-0 max-md:w-full">
                                        <div class="flex flex-col max-md:mt-5">
                                            <time datetime="2024-05-13"
                                                class="self-start text-base font-light text-zinc-500">May 13, 2024</time>
                                            <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar
                                                along with the facullty...</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <p class="mt-3 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                        <div
                            class="flex flex-col px-7 pt-8 pb-16 mt-10 w-full bg-zinc-300 max-md:px-5 max-md:mr-1.5 max-md:max-w-full">
                            <div class="flex flex-wrap gap-5 items-start">
                                <img loading="lazy"
                                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/8ad1fef5b460ea8e56d6c12ed47f33fa30ec9f8d01716263a913ca780622c972?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                                    alt="Thumbnail for sixth popular article"
                                    class="object-contain shrink-0 max-w-full aspect-[1.11] w-[108px]" />
                                <div class="flex flex-col grow shrink-0 basis-0 w-fit">
                                    <time datetime="2024-05-13" class="self-start text-base font-light text-zinc-500">May
                                        13, 2024</time>
                                    <h4 class="mt-1 text-xl font-semibold text-black">Prof. Dr. Saeed Ahmad Buzdar along
                                        with the facullty...</h4>
                                </div>
                            </div>
                            <p class="mt-3 mr-5 text-sm text-black max-md:mr-2.5 max-md:max-w-full">Professor Dr. Saeed
                                Ahmed Buzdar, Dean of the Faculty of Physical and Mathematical Sciences has said that the
                                British Council project Pak UK Education....</p>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
        <article class="mt-20 max-md:mt-10">
            <time datetime="2024-05-13" class="text-xl font-light text-zinc-500">May 13, 2024</time>
            <h2 class="mt-3 text-4xl font-semibold text-black max-md:max-w-full">Prof. Dr. Saeed Ahmad Buzdar along with
                the facullty...</h2>
            <div class="flex flex-col items-start mt-12 max-w-full text-xl text-black w-[767px] max-md:mt-10">
                <p class="max-md:max-w-full">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and
                    Mathematical Sciences has said that the British Council project Pak UK Education</p>
                <a href="#"
                    class="px-12 py-2.5 mt-11 text-xs text-center border border-black border-solid text-stone-900 max-md:px-5 max-md:mt-10">Read
                    more</a>
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/a08492095a0ec2c9c7a4be273276f15658311de6dd2d74aebde5a622199be18a?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                    alt="Article image" class="object-contain mt-20 max-w-full aspect-[1.74] w-[687px] max-md:mt-10" />
                <time datetime="2024-05-13" class="mt-12 font-light text-zinc-500 max-md:mt-10">May 13, 2024</time>
                <h3 class="self-stretch text-4xl font-semibold max-md:max-w-full">Prof. Dr. Saeed Ahmad Buzdar along with
                    the facullty...</h3>
                <p class="mt-10 max-md:max-w-full">Professor Dr. Saeed Ahmed Buzdar, Dean of the Faculty of Physical and
                    Mathematical Sciences has said that the British Council project Pak UK Education....</p>
                <a href="#"
                    class="px-12 py-2.5 mt-10 max-w-full text-xs text-center border border-black border-solid text-stone-900 w-[149px] max-md:px-5 max-md:ml-2">Read
                    more</a>
            </div>
        </article>
        <nav class="flex flex-col self-end mt-28 max-w-full text-5xl font-semibold text-black w-[667px] max-md:mt-10 max-md:mr-2.5"
            aria-label="Pagination">
            <div class="self-start">&lt; &gt;</div>
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/ba2a7b11fae8a74a26577123becb23d291e87bd26d61441697a67c3aadf59ae3?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                alt="" class="object-contain self-end mt-4 aspect-[1.08] w-[13px]" />
        </nav>
    </section>
@endsection
