@if ($paginator->hasPages())
    <div class="filters">
        @if ($paginator->onFirstPage())
            <span class="badge">Sebelumnya</span>
        @else
            <a class="badge" href="{{ $paginator->previousPageUrl() }}" rel="prev">Sebelumnya</a>
        @endif

        @if ($paginator->hasMorePages())
            <a class="badge" href="{{ $paginator->nextPageUrl() }}" rel="next">Berikutnya</a>
        @else
            <span class="badge">Berikutnya</span>
        @endif
    </div>
@endif
