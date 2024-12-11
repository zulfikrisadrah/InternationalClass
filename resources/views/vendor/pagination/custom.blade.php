<!-- resources/views/vendor/pagination/custom.blade.php -->
<div class="flex justify-center mt-6">
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="inline-flex items-center space-x-2">
            @if ($paginator->onFirstPage())
                <li>
                    <span class="text-gray-500 cursor-not-allowed">
                        &laquo; Previous
                    </span>
                </li>
            @else
                <li>
                    <a href="{{ $paginator->previousPageUrl() }}" class="text-blueSecondary hover:text-blueThird">
                        &laquo; Previous
                    </a>
                </li>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <li>
                        <span class="text-gray-500">{{ $element }}</span>
                    </li>
                @elseif (is_array($element))
                    @foreach ($element as $page => $url)
                        <li>
                            <a href="{{ $url }}" class="px-3 py-1 rounded-md {{ $page == $paginator->currentPage() ? 'bg-blueThird text-white' : 'text-gray-500 hover:text-blueSecondary' }}">
                                {{ $page }}
                            </a>
                        </li>
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="text-blueSecondary hover:text-blueThird">
                        Next &raquo;
                    </a>
                </li>
            @else
                <li>
                    <span class="text-gray-500 cursor-not-allowed">
                        Next &raquo;
                    </span>
                </li>
            @endif
        </ul>
    </nav>
</div>
