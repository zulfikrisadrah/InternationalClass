<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="flex flex-row justify-between items-center py-2">
        <a href="{{ route('admin.event.create') }}"
            class="ml-auto mr-8 font-bold py-4 px-6 bg-blueThird text-white rounded-full">
            Add New
        </a>
    </div>


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($events as $event)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Display event image if available -->
                            @if ($event->Event_Image)
                                <img src="{{ asset('storage/' . $event->Event_Image) }}" alt="Event Image"
                                    class="rounded-2xl object-cover w-[120px] h-[90px]">
                            @else
                                <div
                                    class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-blueSecondary text-xl font-bold truncate max-w-[200px]">
                                    {{ $event->Event_Title }}
                                </h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Publication Date</p>
                            <h3 class="text-blueSecondary text-xl font-bold">
                                {{ \Carbon\Carbon::parse($event->Publication_Date)->format('d M Y') }}
                            </h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.event.edit', $event->ID_Event) }}"
                                class="font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                                Edit
                            </a>

                            <form action="{{ route('admin.event.destroy', $event->ID_Event) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-redPrimary text-white rounded-full">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <!--Pagination-->
                <div class="mt-4 flex justify-center space-x-3">
                    @if ($events->currentPage() > 3)
                        <a href="{{ $events->url(1) }}"
                            class="px-4 py-2 text-xs border border-gray-300 rounded-md transition-all duration-300 bg-white text-black hover:text-white hover:bg-indigo-400">1</a>
                    @endif

                    @if ($events->currentPage() > 4)
                        <span class="text-gray-500">...</span>
                    @endif

                    @php
                        $start = max(1, $events->currentPage() - 2);
                        $end = min($events->lastPage(), $events->currentPage() + 2);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $events->url($i) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all duration-300 {{ $events->currentPage() == $i ? 'bg-blueSecondary text-white' : 'hover:text-white hover:bg-indigo-400 ' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($events->currentPage() < $events->lastPage() - 2)
                        <span class="text-gray-500">...</span>
                    @endif

                    @if ($events->currentPage() < $events->lastPage() && $events->lastPage() - $events->currentPage() > 2)
                        <a href="{{ $events->url($events->lastPage()) }}"
                            class="px-4 py-2 text-xs border border-gray-300 rounded-md transition-all duration-300 bg-white text-black hover:text-white hover:bg-indigo-400 ">{{ $events->lastPage() }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
