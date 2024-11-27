<nav x-data="{ open: false }"
    class="fixed inset-y-0 left-0 flex flex-col justify-between items-center bg-white  rounded-none max-w-[270px] h-screen w-3/4 sm:w-1/3 md:w-1/4 lg:w-[270px]"
    aria-label="Main Navigation">
    <!-- Logo and Header -->
    <div class="flex gap-1.5 max-w-full text-2xl font-bold text-blue-500 w-[183px] pt-12">
        <h1>International Class</h1>
    </div>

    <!-- Navigation Links -->
    <ul class="flex flex-col justify-center items-start self-stretch pl-2.5 mt-16 w-full">
        @role('admin')
            <li class="flex flex-col justify-center p-px w-full">
                <a href="{{ route('dashboard') }}"
                    class="flex gap-2.5 py-3 px-4 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <div class="flex gap-1">
                        <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-typ-home /></i>
                    </div>
                    <span
                        class="grow shrink my-auto text-xl font-bold {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-zinc-500' }} w-[213px]">Home</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('admin.user.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('admin.user.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-fas-user-friends /> </i>
                    <span class="grow shrink w-[142px]">Users</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('admin.program.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('admin.program.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-iconpark-activitysource /> </i>
                    <span class="grow shrink w-[142px]">Programs</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('admin.news.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('admin.news.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-ionicon-newspaper /> </i>
                    <span class="grow shrink w-[142px]">Event</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('admin.event.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('admin.news.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-ionicon-newspaper /> </i>
                    <span class="grow shrink w-[142px]">News</span>
                </a>
            </li>
        @endrole

        @role('staff')
        <li class="flex flex-col justify-center p-px w-full">
            <a href="{{ route('dashboard') }}"
                class="flex gap-2.5 py-3 px-4 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <div class="flex gap-1">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-typ-home /></i>
                </div>
                <span
                    class="grow shrink my-auto text-xl font-bold {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-zinc-500' }} w-[213px]">Home</span>
            </a>
        </li>
            <li class="mt-12 w-full">
                <a href="{{ route('staff.program.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('staff.program.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-iconpark-activitysource /> </i>
                    <span class="grow shrink w-[142px]">Programs</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('staff.news.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('staff.news.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-ionicon-newspaper /> </i>
                    <span class="grow shrink w-[142px]">news</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('staff.event.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('admin.news.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-ionicon-newspaper /> </i>
                    <span class="grow shrink w-[142px]">event</span>
                </a>
            </li>
        @endrole

        @role('student')
        <li class="flex flex-col justify-center p-px w-full">
            <a href="{{ route('dashboard') }}"
                class="flex gap-2.5 py-3 px-4 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                <div class="flex gap-1">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-typ-home /></i>
                </div>
                <span
                    class="grow shrink my-auto text-xl font-bold {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-zinc-500' }} w-[213px]">Home</span>
            </a>
        </li>
            <li class="mt-12 w-full">
                <a href="{{ route('student.studyPlan.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('student.studyPlan.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-fas-list-alt /> </i>
                    <span class="grow shrink w-[142px]">Study Plan Card</span>
                </a>
            </li>
            <li class="mt-12 w-full">
                <a href="{{ route('student.calender.index') }}"
                    class="flex gap-2.5 py-3 px-4 text-xl font-bold {{ request()->routeIs('student.calender.index') ? 'bg-blue-50 text-blue-600' : 'text-zinc-500' }}">
                    <i class="object-contain shrink-0 my-auto aspect-[0.96] w-[25px]"> <x-bi-calendar2-day-fill /> </i>
                    <span class="grow shrink w-[142px]">Academic Calender</span>
                </a>
            </li>
        @endrole
    </ul>


    <!-- Sign Out Button -->
    <form method="POST" action="{{ route('logout') }}" class="w-full mt-10 pb-12">
        @csrf
        <button class="flex items-center justify-center gap-2 px-9 text-xl font-bold text-rose-500 w-full"
            onclick="event.preventDefault(); this.closest('form').submit();">
            <span class="flex-shrink-0">
                <x-phosphor-sign-out-bold class="w-[25px] h-[25px]" />
            </span>
            <span>Sign Out</span>
        </button>
    </form>
</nav>
