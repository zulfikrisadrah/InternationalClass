<div class="flex justify-between items-center w-full">
    <div class="flex items-center justify-between">
        <label for="my-drawer-2" class="lg:hidden hamburger-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </label>

        <div class="text-xl font-bold text-black ml-4 lg:mt-4">
            {{ $data['title'] ?? '' }}
        </div>
    </div>



    <div class="flex items-center gap-1.5 tracking-tight whitespace-nowrap text-black">
        @hasanyrole('admin|staff')
            <div class="btn m-1 bg-blue-50 border-none gap-2 px-3.5 py-1.5 rounded-xl flex items-center cursor-default">
                <span class="my-auto text-black">{{ Auth::user()->name ?? 'user' }}</span>
            </div>
        @endhasanyrole

        @role('student')
            <a href="{{ route('profile.edit') }}"
                class="btn m-1 bg-blue-50 border-none gap-2 px-3.5 py-1.5 rounded-xl flex items-center">
                <span class="my-auto text-black">{{ Auth::user()->name ?? 'user' }}</span>
            </a>
        @endrole
    </div>
</div>
