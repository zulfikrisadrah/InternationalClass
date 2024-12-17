<div class="drawer lg:drawer-open">
    <input id="my-drawer-2" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content">
        <div class="flex-1 max-w-full lg:ml-64 p-3">
            @isset($header)
                <header>
                    <div class="w-auto mx-6 py-6">
                        {{ $header }}
                    </div>
                </header>
            @endisset
            <main>
                @if (auth()->user()->hasRole('admin'))
                    <div class="admin-layout">
                        {{ $slot }}
                    </div>
                @elseif(auth()->user()->hasRole('staff'))
                    <div class="staff-layout">
                        {{ $slot }}
                    </div>
                @elseif(auth()->user()->hasRole('student'))
                    <div class="student-layout">
                        {{ $slot }}
                    </div>
                @endif
            </main>
        </div>
    </div>
    <div class="drawer-side">
        <label for="my-drawer-2" class="drawer-overlay"></label>
        <nav x-data="{ open: false }"
            class="fixed inset-y-0 left-0 flex flex-col justify-between items-center bg-white rounded-none max-w-[270px] h-screen w-3/4 sm:w-1/3 md:w-1/4 lg:w-[270px]"
            aria-label="Main Navigation">
            <!-- Logo and Header -->
            <div class="flex gap-1.5 max-w-full text-2xl font-bold text-blueThird w-[183px] pt-12">
                <h1>International Class</h1>
            </div>

            <!-- Navigation Links -->
            <ul class="flex flex-col justify-center items-start self-stretch pl-2 mt-6 w-auto">
                @role('admin')
                    <li class="w-full">
                        <a href="{{ route('dashboard') }}"
                            class="flex gap-2 py-2 px-3 w-full text-xl font-semibold {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <div class="flex gap-1">
                                <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                                        <path
                                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                    </svg>
                                </i>
                            </div>
                            <span
                                class="grow shrink my-auto text-xl font-semibold {{ request()->routeIs('dashboard') ? 'text-blueThird' : 'text-zinc-500' }} w-full">Home</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.user.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.user.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </i>
                            <span class="grow shrink text-xl">Users</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.program.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.program.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Programs</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.studyProgram.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.studyProgram.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Study Programs</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.event.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.event.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Event</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.news.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.news.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor">
                                    <path
                                        d="M 1.9375 2.78125 C 1.386719 2.78125 0.9375 3.230469 0.9375 3.78125 L 0.9375 39.46875 C 0.9375 42.082031 1.699219 44.1875 3.25 45.71875 C 5.714844 48.15625 9.242188 48.21875 9.59375 48.21875 L 41.375 48.21875 C 41.429688 48.21875 41.773438 48.226563 42.25 48.15625 C 39.136719 47.761719 34.625 45.617188 34.625 39.46875 L 34.625 3.78125 C 34.625 3.230469 34.179688 2.78125 33.625 2.78125 Z M 36.625 9.5 L 36.625 39.46875 C 36.625 46.113281 43.039063 46.21875 43.3125 46.21875 C 43.851563 46.214844 48.3125 46.011719 49 40.90625 C 49.046875 40.472656 49.0625 40.019531 49.0625 39.53125 L 49.0625 14.4375 C 49.0625 14.433594 49.0625 14.410156 49.0625 14.40625 C 49.027344 12.957031 48.25 10.414063 45.65625 9.71875 C 44.84375 9.914063 44.167969 10.277344 43.65625 10.8125 C 42.332031 12.195313 42.375 14.324219 42.375 14.34375 L 42.375 38.625 C 42.375 39.179688 41.929688 39.625 41.375 39.625 C 40.820313 39.625 40.375 39.179688 40.375 38.625 L 40.375 14.375 C 40.371094 14.300781 40.273438 11.511719 42.125 9.5 Z M 7.21875 11 L 26.9375 11 C 27.492188 11 27.9375 11.449219 27.9375 12 C 27.9375 12.550781 27.492188 13 26.9375 13 L 7.21875 13 C 6.667969 13 6.21875 12.550781 6.21875 12 C 6.21875 11.449219 6.667969 11 7.21875 11 Z M 7.21875 15 L 26.9375 15 C 27.492188 15 27.9375 15.449219 27.9375 16 C 27.9375 16.550781 27.492188 17 26.9375 17 L 7.21875 17 C 6.667969 17 6.21875 16.550781 6.21875 16 C 6.21875 15.449219 6.667969 15 7.21875 15 Z M 7.6875 23 L 14.46875 23 C 15.019531 23 15.46875 23.449219 15.46875 24 C 15.46875 24.550781 15.019531 25 14.46875 25 L 7.6875 25 C 7.136719 25 6.6875 24.550781 6.6875 24 C 6.6875 23.449219 7.136719 23 7.6875 23 Z M 19.21875 23 L 26.9375 23 C 27.492188 23 27.9375 23.449219 27.9375 24 C 27.9375 24.550781 27.492188 25 26.9375 25 L 19.21875 25 C 18.667969 25 18.21875 24.550781 18.21875 24 C 18.21875 23.449219 18.667969 23 19.21875 23 Z M 7.6875 27 L 14.46875 27 C 15.019531 27 15.46875 27.445313 15.46875 28 C 15.46875 28.554688 15.019531 29 14.46875 29 L 7.6875 29 C 7.136719 29 6.6875 28.554688 6.6875 28 C 6.6875 27.445313 7.136719 27 7.6875 27 Z M 19.21875 27 L 26.9375 27 C 27.492188 27 27.9375 27.445313 27.9375 28 C 27.9375 28.554688 27.492188 29 26.9375 29 L 19.21875 29 C 18.667969 29 18.21875 28.554688 18.21875 28 C 18.21875 27.445313 18.667969 27 19.21875 27 Z M 19.21875 30.78125 L 26.9375 30.78125 C 27.492188 30.78125 27.9375 31.226563 27.9375 31.78125 C 27.9375 32.335938 27.492188 32.78125 26.9375 32.78125 L 19.21875 32.78125 C 18.667969 32.78125 18.21875 32.335938 18.21875 31.78125 C 18.21875 31.226563 18.667969 30.78125 19.21875 30.78125 Z M 7.6875 31 L 14.46875 31 C 15.019531 31 15.46875 31.445313 15.46875 32 C 15.46875 32.554688 15.019531 33 14.46875 33 L 7.6875 33 C 7.136719 33 6.6875 32.554688 6.6875 32 C 6.6875 31.445313 7.136719 31 7.6875 31 Z M 19.21875 34.78125 L 26.9375 34.78125 C 27.492188 34.78125 27.9375 35.226563 27.9375 35.78125 C 27.9375 36.335938 27.492188 36.78125 26.9375 36.78125 L 19.21875 36.78125 C 18.667969 36.78125 18.21875 36.335938 18.21875 35.78125 C 18.21875 35.226563 18.667969 34.78125 19.21875 34.78125 Z M 7.6875 35 L 14.46875 35 C 15.019531 35 15.46875 35.445313 15.46875 36 C 15.46875 36.554688 15.019531 37 14.46875 37 L 7.6875 37 C 7.136719 37 6.6875 36.554688 6.6875 36 C 6.6875 35.445313 7.136719 35 7.6875 35 Z M 19.21875 38.53125 L 26.9375 38.53125 C 27.492188 38.53125 27.9375 38.976563 27.9375 39.53125 C 27.9375 40.085938 27.492188 40.53125 26.9375 40.53125 L 19.21875 40.53125 C 18.667969 40.53125 18.21875 40.085938 18.21875 39.53125 C 18.21875 38.976563 18.667969 38.53125 19.21875 38.53125 Z M 7.6875 39 L 14.46875 39 C 15.019531 39 15.46875 39.445313 15.46875 40 C 15.46875 40.554688 15.019531 41 14.46875 41 L 7.6875 41 C 7.136719 41 6.6875 40.554688 6.6875 40 C 6.6875 39.445313 7.136719 39 7.6875 39 Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">News</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('admin.calender.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.calender.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Academic Calendar</span>
                        </a>
                    </li>
                @endrole
                @role('staff')
                    <li class="w-full">
                        <a href="{{ route('dashboard') }}"
                            class="flex gap-2 py-2 px-3 w-full text-xl font-semibold {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <div class="flex gap-1">
                                <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                                        <path
                                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                    </svg>
                                </i>
                            </div>
                            <span
                                class="grow shrink my-auto text-xl font-semibold {{ request()->routeIs('dashboard') ? 'text-blueThird' : 'text-zinc-500' }} w-full">Home</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('staff.user.index') }}"
                            class="flex gap-2 py-2 px-3 text-xl font-semibold {{ request()->routeIs('admin.user.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" fill="currentColor">
                                    <path
                                        d="M144 0a80 80 0 1 1 0 160A80 80 0 1 1 144 0zM512 0a80 80 0 1 1 0 160A80 80 0 1 1 512 0zM0 298.7C0 239.8 47.8 192 106.7 192l42.7 0c15.9 0 31 3.5 44.6 9.7c-1.3 7.2-1.9 14.7-1.9 22.3c0 38.2 16.8 72.5 43.3 96c-.2 0-.4 0-.7 0L21.3 320C9.6 320 0 310.4 0 298.7zM405.3 320c-.2 0-.4 0-.7 0c26.6-23.5 43.3-57.8 43.3-96c0-7.6-.7-15-1.9-22.3c13.6-6.3 28.7-9.7 44.6-9.7l42.7 0C592.2 192 640 239.8 640 298.7c0 11.8-9.6 21.3-21.3 21.3l-213.3 0zM224 224a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zM128 485.3C128 411.7 187.7 352 261.3 352l117.3 0C452.3 352 512 411.7 512 485.3c0 14.7-11.9 26.7-26.7 26.7l-330.7 0c-14.7 0-26.7-11.9-26.7-26.7z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Users</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('staff.program.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('staff.program.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                    <path
                                        d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Programs</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('staff.news.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('staff.news.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" fill="currentColor">
                                    <path
                                        d="M 1.9375 2.78125 C 1.386719 2.78125 0.9375 3.230469 0.9375 3.78125 L 0.9375 39.46875 C 0.9375 42.082031 1.699219 44.1875 3.25 45.71875 C 5.714844 48.15625 9.242188 48.21875 9.59375 48.21875 L 41.375 48.21875 C 41.429688 48.21875 41.773438 48.226563 42.25 48.15625 C 39.136719 47.761719 34.625 45.617188 34.625 39.46875 L 34.625 3.78125 C 34.625 3.230469 34.179688 2.78125 33.625 2.78125 Z M 36.625 9.5 L 36.625 39.46875 C 36.625 46.113281 43.039063 46.21875 43.3125 46.21875 C 43.851563 46.214844 48.3125 46.011719 49 40.90625 C 49.046875 40.472656 49.0625 40.019531 49.0625 39.53125 L 49.0625 14.4375 C 49.0625 14.433594 49.0625 14.410156 49.0625 14.40625 C 49.027344 12.957031 48.25 10.414063 45.65625 9.71875 C 44.84375 9.914063 44.167969 10.277344 43.65625 10.8125 C 42.332031 12.195313 42.375 14.324219 42.375 14.34375 L 42.375 38.625 C 42.375 39.179688 41.929688 39.625 41.375 39.625 C 40.820313 39.625 40.375 39.179688 40.375 38.625 L 40.375 14.375 C 40.371094 14.300781 40.273438 11.511719 42.125 9.5 Z M 7.21875 11 L 26.9375 11 C 27.492188 11 27.9375 11.449219 27.9375 12 C 27.9375 12.550781 27.492188 13 26.9375 13 L 7.21875 13 C 6.667969 13 6.21875 12.550781 6.21875 12 C 6.21875 11.449219 6.667969 11 7.21875 11 Z M 7.21875 15 L 26.9375 15 C 27.492188 15 27.9375 15.449219 27.9375 16 C 27.9375 16.550781 27.492188 17 26.9375 17 L 7.21875 17 C 6.667969 17 6.21875 16.550781 6.21875 16 C 6.21875 15.449219 6.667969 15 7.21875 15 Z M 7.6875 23 L 14.46875 23 C 15.019531 23 15.46875 23.449219 15.46875 24 C 15.46875 24.550781 15.019531 25 14.46875 25 L 7.6875 25 C 7.136719 25 6.6875 24.550781 6.6875 24 C 6.6875 23.449219 7.136719 23 7.6875 23 Z M 19.21875 23 L 26.9375 23 C 27.492188 23 27.9375 23.449219 27.9375 24 C 27.9375 24.550781 27.492188 25 26.9375 25 L 19.21875 25 C 18.667969 25 18.21875 24.550781 18.21875 24 C 18.21875 23.449219 18.667969 23 19.21875 23 Z M 7.6875 27 L 14.46875 27 C 15.019531 27 15.46875 27.445313 15.46875 28 C 15.46875 28.554688 15.019531 29 14.46875 29 L 7.6875 29 C 7.136719 29 6.6875 28.554688 6.6875 28 C 6.6875 27.445313 7.136719 27 7.6875 27 Z M 19.21875 27 L 26.9375 27 C 27.492188 27 27.9375 27.445313 27.9375 28 C 27.9375 28.554688 27.492188 29 26.9375 29 L 19.21875 29 C 18.667969 29 18.21875 28.554688 18.21875 28 C 18.21875 27.445313 18.667969 27 19.21875 27 Z M 19.21875 30.78125 L 26.9375 30.78125 C 27.492188 30.78125 27.9375 31.226563 27.9375 31.78125 C 27.9375 32.335938 27.492188 32.78125 26.9375 32.78125 L 19.21875 32.78125 C 18.667969 32.78125 18.21875 32.335938 18.21875 31.78125 C 18.21875 31.226563 18.667969 30.78125 19.21875 30.78125 Z M 7.6875 31 L 14.46875 31 C 15.019531 31 15.46875 31.445313 15.46875 32 C 15.46875 32.554688 15.019531 33 14.46875 33 L 7.6875 33 C 7.136719 33 6.6875 32.554688 6.6875 32 C 6.6875 31.445313 7.136719 31 7.6875 31 Z M 19.21875 34.78125 L 26.9375 34.78125 C 27.492188 34.78125 27.9375 35.226563 27.9375 35.78125 C 27.9375 36.335938 27.492188 36.78125 26.9375 36.78125 L 19.21875 36.78125 C 18.667969 36.78125 18.21875 36.335938 18.21875 35.78125 C 18.21875 35.226563 18.667969 34.78125 19.21875 34.78125 Z M 7.6875 35 L 14.46875 35 C 15.019531 35 15.46875 35.445313 15.46875 36 C 15.46875 36.554688 15.019531 37 14.46875 37 L 7.6875 37 C 7.136719 37 6.6875 36.554688 6.6875 36 C 6.6875 35.445313 7.136719 35 7.6875 35 Z M 19.21875 38.53125 L 26.9375 38.53125 C 27.492188 38.53125 27.9375 38.976563 27.9375 39.53125 C 27.9375 40.085938 27.492188 40.53125 26.9375 40.53125 L 19.21875 40.53125 C 18.667969 40.53125 18.21875 40.085938 18.21875 39.53125 C 18.21875 38.976563 18.667969 38.53125 19.21875 38.53125 Z M 7.6875 39 L 14.46875 39 C 15.019531 39 15.46875 39.445313 15.46875 40 C 15.46875 40.554688 15.019531 41 14.46875 41 L 7.6875 41 C 7.136719 41 6.6875 40.554688 6.6875 40 C 6.6875 39.445313 7.136719 39 7.6875 39 Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">News</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('staff.event.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('staff.event.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Event</span>
                        </a>
                    </li>
                @endrole

                @role('student')
                    <li class="w-full">
                        <a href="{{ route('dashboard') }}"
                            class="flex gap-2 py-2 px-3 w-full text-xl font-semibold {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <div class="flex gap-1">
                                <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" fill="currentColor">
                                        <path
                                            d="M575.8 255.5c0 18-15 32.1-32 32.1l-32 0 .7 160.2c0 2.7-.2 5.4-.5 8.1l0 16.2c0 22.1-17.9 40-40 40l-16 0c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1L416 512l-24 0c-22.1 0-40-17.9-40-40l0-24 0-64c0-17.7-14.3-32-32-32l-64 0c-17.7 0-32 14.3-32 32l0 64 0 24c0 22.1-17.9 40-40 40l-24 0-31.9 0c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2l-16 0c-22.1 0-40-17.9-40-40l0-112c0-.9 0-1.9 .1-2.8l0-69.7-32 0c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                    </svg>
                                </i>
                            </div>
                            <span
                                class="grow shrink my-auto text-xl font-semibold {{ request()->routeIs('dashboard') ? 'text-blueThird' : 'text-zinc-500' }} w-full">Home</span>
                        </a>
                    </li>
                    @if (auth()->check() && auth()->user()->student && auth()->user()->student->isActive == 1)
                        <li class="w-full mt-4">
                            <a href="{{ route('student.program.index') }}"
                                class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('student.program.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                                <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                                        <path
                                            d="M40 48C26.7 48 16 58.7 16 72l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24L40 48zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L192 64zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32l288 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-288 0zM16 232l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24l0 48c0 13.3 10.7 24 24 24l48 0c13.3 0 24-10.7 24-24l0-48c0-13.3-10.7-24-24-24l-48 0z" />
                                    </svg>
                                </i>
                                <span class="grow shrink w-full">Programs</span>
                            </a>
                        </li>
                    @endif
                    <li class="w-full mt-4">
                        <a href="{{ route('student.studyPlan.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('student.studyPlan.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                    <path
                                        d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Study Plan Card</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('student.transcript.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('student.transcript.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" fill="currentColor">
                                    <path
                                        d="M96 0C43 0 0 43 0 96L0 416c0 53 43 96 96 96l288 0 32 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l0-64c17.7 0 32-14.3 32-32l0-320c0-17.7-14.3-32-32-32L384 0 96 0zm0 384l256 0 0 64L96 448c-17.7 0-32-14.3-32-32s14.3-32 32-32zm32-240c0-8.8 7.2-16 16-16l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16zm16 48l192 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-192 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z" />
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Transcript</span>
                        </a>
                    </li>
                    <li class="w-full mt-4">
                        <a href="{{ route('student.calender.index') }}"
                            class="flex gap-2 py-3 px-4 text-xl font-semibold {{ request()->routeIs('student.calender.index') ? 'bg-blue-50 text-blueThird' : 'text-zinc-500' }}">
                            <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                                    <path
                                        d="M17 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9V3H15V1H17V3ZM4 9V19H20V9H4ZM6 13H11V17H6V13Z">
                                    </path>
                                </svg>
                            </i>
                            <span class="grow shrink w-full">Academic Calendar</span>
                        </a>
                    </li>
                @endrole

            </ul>

            <!-- Sign Out Button -->
            <form method="POST" action="{{ route('logout') }}" class="w-full mt-10 pb-12">
                @csrf
                <button class="flex items-center justify-center gap-2 px-9 text-xl font-semibold text-rose-500 w-full"
                    onclick="event.preventDefault(); this.closest('form').submit();">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-6">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" fill="currentColor">
                            <path
                                d="M502.6 278.6c12.5-12.5 12.5-32.8 0-45.3l-128-128c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L402.7 224 192 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l210.7 0-73.4 73.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0l128-128zM160 96c17.7 0 32-14.3 32-32s-14.3-32-32-32L96 32C43 32 0 75 0 128L0 384c0 53 43 96 96 96l64 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-64 0c-17.7 0-32-14.3-32-32l0-256c0-17.7 14.3-32 32-32l64 0z" />
                        </svg>
                    </i>
                    <span>Sign Out</span>
                </button>
            </form>
        </nav>
    </div>
</div>
