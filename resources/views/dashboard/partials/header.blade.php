<div class="flex justify-between items-center">
    <!-- Left Side: Search Form -->
    <form class="flex items-center gap-2.5 px-4 py-2 bg-white rounded-full shadow-md">
        <label for="searchInput" class="sr-only">Search Courses, Documents, Activities...</label>
        <input type="text" id="searchInput" placeholder="Search Courses, Documents, Activities..."
            class="input w-full max-w-xs bg-transparent focus:outline-none placeholder:text-zinc-500"
            aria-label="Search Courses, Documents, Activities" />
        <button type="submit" class="bg-transparent border-none cursor-pointer" aria-label="Search">
            <img loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/95e6b0fa6375bdde78de295f2a54e88e82e9573be217444975536c6bd7f21f13?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                class="object-contain w-6 aspect-[0.96]" alt="Search Icon" />
        </button>
    </form>
    <!-- Right Side: Profile and User Menu -->
    <div class="flex items-center gap-1.5 tracking-tight whitespace-nowrap text-zinc-800">
        <!-- Notification Icon -->
        <img loading="lazy"
            src="https://cdn.builder.io/api/v1/image/assets/TEMP/53f722529e3bb5f9b3ad3c5b74bed11f33e5374972a91f4e6d8108d2c451f892?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
            class="object-contain shrink-0 my-auto w-6 aspect-[0.8]" alt="Notification Icon" />

        <!-- Profile Dropdown -->
        <div class="dropdown dropdown-end">
            <label tabindex="0"
                class="btn bg-blue-50 border-none gap-2 px-3.5 py-1.5 rounded-xl flex items-center">
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/2d27a46a60a7aa63e5b78e6b0e1b26aec43bb1d00c839704efa9e553508b9277?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                    class="object-contain shrink-0 rounded-xl aspect-[1.18] w-[47px]"
                    alt="Profile picture of Haikal" />
                <span class="my-auto">{{ Auth::user()->name ?? 'Haikal' }}</span>
                <img loading="lazy"
                    src="https://cdn.builder.io/api/v1/image/assets/TEMP/29696fbf8274602a5431f9a88553916079d906008babd700784452ff4cd45b31?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7"
                    class="object-contain shrink-0 my-auto w-3 aspect-square" alt="Dropdown Icon" />
            </label>

            <!-- Dropdown Menu -->
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-base-100 rounded-box w-52">
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a href="{{ route('profile.edit') }}">Settings</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left">Sign Out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
