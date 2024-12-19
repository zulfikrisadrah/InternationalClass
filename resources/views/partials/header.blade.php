<header>
    <!-- Main Navbar -->
    <div class="bg-redPrimary text-white py-2" style="box-shadow: 0 -2px 18px rgba(0, 0, 0, 0.2);">
        <div class="container mx-auto px-6">
            <div class="navbar p-0 flex items-center justify-between">
                <!-- Logo (Left) -->
                <div class="navbar-start w-auto">
                    <a href="{{ route('landing.page') }}" class="flex items-center gap-2">
                        <img src="{{ asset('images/logoUnhas.png') }}" alt="Logo" class="w-8">
                        <div class="w-px h-6 bg-white hidden sm:block"></div>
                        <span class="font-semibold text-xs sm:text-sm">International Class <br> Hasanuddin University</span>
                    </a>
                </div>

                <!-- Mobile Menu Dropdown -->
                <div class="navbar-end sm:hidden">
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost">
                            <svg class="fill-current h-5 w-5" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
                            </svg>
                        </div>
                        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52 text-black">
                            <li><a href="{{ route('about.index') }}">About</a></li>
                            <li>
                                <details>
                                    <summary>Program</summary>
                                    <ul>
                                        <li><a href="{{ route('studyProgram.index') }}">Study Program</a></li>
                                        <li><a href="{{ route('InternationalExposure.index') }}">International Exposure Program</a></li>
                                    </ul>
                                </details>
                            </li>
                            <li>
                                <details>
                                    <summary>Information</summary>
                                    <ul>
                                        <li><a href="{{ route('news.index') }}">News</a></li>
                                        <li><a href="{{ route('event.index') }}">Event</a></li>
                                    </ul>
                                </details>
                            </li>
                            <li><a href="{{ route('login') }}" class="text-redPrimary hover:bg-redPrimary hover:text-white">Login</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Desktop Navigation -->
                <div class="navbar-center hidden sm:block w-auto">
                    <ul class="menu menu-horizontal px-1 space-x-4">
                        <li><a href="{{ route('about.index') }}" class="hover:text-gray-900">About</a></li>
                        <li>
                            <details class="dropdown">
                                <summary class="hover:text-gray-900">Program</summary>
                                <ul class="p-2 bg-base-100 rounded-t-none text-black z-10">
                                    <li><a href="{{ route('studyProgram.index') }}">Study Program</a></li>
                                    <li><a href="{{ route('InternationalExposure.index') }}">International Exposure Program</a></li>
                                </ul>
                            </details>
                        </li>
                        <li>
                            <details class="dropdown">
                                <summary class="hover:text-gray-900">Information</summary>
                                <ul class="p-2 bg-base-100 rounded-t-none text-black z-10">
                                    <li><a href="{{ route('news.index') }}">News</a></li>
                                    <li><a href="{{ route('event.index') }}">Event</a></li>
                                </ul>
                            </details>
                        </li>
                    </ul>
                </div>

                <!-- Login Button -->
                <div class="navbar-end hidden sm:block w-auto">
                    <a href="{{ route('login') }}" class="text-white hover:text-gray-300 transition-colors duration-300">Login</a>
                </div>
            </div>
        </div>
    </div>
</header>
