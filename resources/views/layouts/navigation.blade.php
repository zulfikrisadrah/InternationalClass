<nav x-data="{ open: false }" class="fixed inset-y-0 left-0 flex flex-col justify-between items-center bg-white  rounded-none max-w-[270px] h-screen w-3/4 sm:w-1/3 md:w-1/4 lg:w-[270px]" aria-label="Main Navigation">
    <!-- Logo and Header -->
    <div class="flex gap-1.5 max-w-full text-2xl font-bold text-blue-500 w-[183px] pt-12">
        <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/62ceb8205bf88c56d839d6567aba3f155933937062c2826e1d3e3f58ca0b8cfb?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 aspect-[0.83] w-[29px]" alt="International Class Logo" />
        <h1>International Class</h1>
    </div>

    <!-- Navigation Links -->
    <ul class="flex flex-col justify-center items-start self-stretch pl-2.5 mt-16 w-full">
        <li class="flex flex-col justify-center p-px w-full">
            <a href="{{ route('dashboard') }}" class="flex gap-2.5 py-3 px-4 {{ request()->routeIs('dashboard') ? 'bg-blue-50' : '' }}">
                <div class="flex gap-1">
                    <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/96e23ef634af7bf374ec57a83d5743f3a0a37c0f21e66c7d6e63d097676988d5?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]" alt="Home Icon" />
                </div>
                <span class="grow shrink my-auto text-xl font-bold {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-zinc-500' }} w-[213px]">Home</span>
            </a>
        </li>
        <li class="mt-12 w-full">
            <a href="{{ route('user') }}" class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('user') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a762db1e3bcbb58cfd22caa167084d2ad439be98cb53c6642bf53c7631a23c81?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 self-start aspect-square w-[25px]" alt="Users Icon" />
                <span class="grow shrink w-[142px]">Users</span>
            </a>
        </li>
        <li class="mt-12 w-full">
            <a href="{{ route('class') }}" class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('class') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/f7c65653ae84ac3f19a73ff468be26cde7fef5c5f31c6fe9cf7ec77951f54fb0?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 w-8 aspect-[1.07]" alt="Calendar Icon" />
                <span class="grow shrink w-[198px]">Classes</span>
            </a>
        </li>
        <li class="mt-12 w-full">
            <a href="{{ route('program') }}" class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('program') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a762db1e3bcbb58cfd22caa167084d2ad439be98cb53c6642bf53c7631a23c81?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 self-start aspect-square w-[25px]" alt="Programs Icon" />
                <span class="grow shrink w-[142px]">Programs</span>
            </a>
        </li>
        <li class="mt-12 w-full">
            <a href="{{ route('information') }}" class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('information') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <img loading="lazy" src="https://cdn.builder.io/api/v1/image/assets/TEMP/a762db1e3bcbb58cfd22caa167084d2ad439be98cb53c6642bf53c7631a23c81?placeholderIfAbsent=true&apiKey=7c9559411ddd4cc5a44b09e523cbfed7" class="object-contain shrink-0 self-start aspect-square w-[25px]" alt="Informations Icon" />
                <span class="grow shrink w-[142px]">Informations</span>
            </a>
        </li>
    </ul>


    <!-- Sign Out Button -->
    <form method="POST" action="{{ route('logout') }}" class="w-full mt-10 pb-12">
        @csrf
        <button class="px-9 text-xl font-bold text-rose-500 w-full" onclick="event.preventDefault(); this.closest('form').submit();">
            Sign Out
        </button>
    </form>
</nav>
