<x-app-layout>
    <x-slot name="header">
        @include('dashboard.partials.header')
    </x-slot>

    <div class="flex flex-row justify-between items-center py-2">
        <a href="{{ route('admin.news.create') }}"
            class="ml-auto mr-8 font-bold py-4 px-6 bg-blueThird text-white rounded-full">
            Add New
        </a>
    </div>

    <div class="py-6">
        <div class="w-auto mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10 flex flex-col gap-y-5">
                @foreach ($news as $new)
                    <div class="item-card flex flex-row justify-between items-center">
                        <div class="flex flex-row items-center gap-x-3">
                            <!-- Display event image if available -->
                            @if ($new->News_Image)
                                <img src="{{ asset('storage/' . $new->News_Image) }}" alt="News Image"
                                    class="rounded-2xl object-cover w-[120px] h-[90px]">
                            @else
                                <div
                                    class="w-[120px] h-[90px] bg-gray-300 rounded-2xl flex items-center justify-center
                                    text-gray-500">
                                    No Image
                                </div>
                            @endif
                            <div class="flex flex-col">
                                <h3 class="text-blueSecondary text-xl font-bold truncate max-w-[200px]">{{ $new->News_Title }}
                                </h3>
                            </div>
                        </div>

                        <div class="hidden md:flex flex-col">
                            <p class="text-slate-500 text-sm">Publication Date</p>
                            <h3 class="text-blueSecondary text-xl font-bold">
                                {{ \Carbon\Carbon::parse($new->Publication_Date)->format('d M Y') }}</h3>
                        </div>

                        <div class="hidden md:flex flex-row items-center gap-x-3">
                            <a href="{{ route('admin.news.edit', $new->ID_News) }}"
                                class="font-bold py-4 px-6 bg-blueThird text-white rounded-full">
                                Edit
                            </a>

                            <form action="{{ route('admin.news.destroy', $new->ID_News) }}" method="POST"
                                onsubmit="return confirm('Are you sure you want to delete this news?');">
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
                    @if ($news->currentPage() > 3)
                        <a href="{{ $news->url(1) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all
                            duration-300 bg-white text-black hover:text-white hover:bg-indigo-400">1</a>
                    @endif

                    @if ($news->currentPage() > 4)
                        <span class="text-gray-500">...</span>
                    @endif

                    @php
                        $start = max(1, $news->currentPage() - 2);
                        $end = min($news->lastPage(), $news->currentPage() + 2);
                    @endphp

                    @for ($i = $start; $i <= $end; $i++)
                        <a href="{{ $news->url($i) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all
                            duration-300 {{ $news->currentPage() == $i ? 'bg-blueSecondary text-white' : 'hover:text-white
                            hover:bg-indigo-400 ' }}">
                            {{ $i }}
                        </a>
                    @endfor

                    @if ($news->currentPage() < $news->lastPage() - 2)
                        <span class="text-gray-500">...</span>
                    @endif

                    @if ($news->currentPage() < $news->lastPage() && $news->lastPage() - $news->currentPage() > 2)
                        <a href="{{ $news->url($news->lastPage()) }}"
                            class="px-4 py-2 text-xs text-black border border-gray-300 rounded-md transition-all
                            duration-300 bg-white text-black hover:text-white hover:bg-indigo-400 ">{{ $news->lastPage() }}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
