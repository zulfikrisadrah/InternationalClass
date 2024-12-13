<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-between">
            <form method="GET" action="{{ route('admin.event.index') }}" class="flex items-center gap-4 pt-2">
                <input type="text" name="search" value="{{ request()->get('search') }}"
                    placeholder="Search events by title" class="py-2 px-4 border rounded-lg">
                <button type="submit" class="bg-blueThird text-white py-2 px-6 rounded-lg">Search</button>
            </form>

            <a href="{{ route('admin.event.create') }}"
                class="ml-auto font-bold py-4 px-6 bg-blueThird text-white rounded-3xl">
                Add New
            </a>
        </div>
    </div>



    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @forelse ($events as $event)
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
                            <p class="text-slate-500 text-sm">Event Date</p>
                            <h3 class="text-blueSecondary text-xl font-bold">
                                {{ \Carbon\Carbon::parse($event->Event_Date)->format('d M Y') }}
                            </h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.event.edit', $event->ID_Event) }}"
                                class="font-bold py-4 px-6 bg-blueThird text-white rounded-3xl">
                                Edit
                            </a>

                            <form action="{{ route('admin.event.destroy', $event->ID_Event) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this event?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="font-bold py-4 px-6 bg-redPrimary text-white rounded-3xl">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-center text-lg font-bold text-black">No Event Available</p>
                @endforelse
                    @if ($events->count() > 10)
                        <div class="mt-6 ">
                            {{ $events->appends(request()->query())->links('vendor.pagination.custom') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </x-app-layout>
