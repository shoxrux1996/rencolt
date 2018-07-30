
@if ($paginator->hasPages())

    <ul class="pagination pagination-warning">

        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled">
                <a>
                    <
                </a>
            </li>
        @else
            <li><a href="{{ $paginator->previousPageUrl() }}"> < </a></li>
        @endif
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><a>{{ $element }}</a></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a class="animated infinite pulse">{{ $page }}</a></li>
                    @else
                        <li><a href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())

            <li><a href="{{ $paginator->nextPageUrl() }}"> > </a></li>
        @else
            <li class="disabled">
                <a>
                    >
                </a>
            </li>
        @endif
    </ul>
@endif

