@if ($paginator->hasPages())
    <ul class="pagination center-align" role="navigation">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="waves-effect disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span class="disabled" aria-hidden="true"><i class="fa fa-angle-left"></i></span>
            </li>
        @else
            <li class="waves-effect">
                <a class="" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="fa fa-angle-left"></i></a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="waves-effect disabled" aria-disabled="true"><a class="">{{ $element }}</a></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="waves-effect active" aria-current="page"><a class="">{{ $page }}</a></li>
                    @else
                        <li class="waves-effect"><a class="" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="waves-effect">
                <a class="" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="fa fa-angle-right"></i></a>
            </li>
        @else
            <li class="waves-effect disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                <span class="" aria-hidden="true"><i class="fa fa-angle-right"></i></span>
            </li>
        @endif
    </ul>
@endif
