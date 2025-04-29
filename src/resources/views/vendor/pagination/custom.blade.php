@if ($paginator->hasPages())
<ul class="pagination">
    {{-- previous --}}
    @if ($paginator->onFirstPage())
    <li class="disabled"><span>‹</span></li>
    @else
    <li><a href="{{ $paginator->previousPageUrl() }}">‹</a></li>
    @endif

    {{-- page number --}}
    @foreach ($elements as $element)
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active"><span>{{ $page }}</span></li>
    @else
    <li><a href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- next --}}
    @if ($paginator->hasMorePages())
    <li><a href="{{ $paginator->nextPageUrl() }}">›</a></li>
    @else
    <li class="disabled"><span>›</span></li>
    @endif
</ul>
@endif