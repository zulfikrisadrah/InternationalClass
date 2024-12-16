<div class="flex justify-between items-center w-full">
    <!-- Left Side: Academic Calendar Title -->
    <div class="text-xl font-bold text-black mt-4">{{ $data['title'] ?? '' }}</div>


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
