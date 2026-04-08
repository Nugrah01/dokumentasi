@if ($paginator->hasPages())
<nav role="navigation" aria-label="{{ __('Pagination Navigation') }}" class="pag-nav">

    {{-- Mobile --}}
    <div class="pag-mobile">
        @if ($paginator->onFirstPage())
            <span class="pag-btn pag-disabled">{{ __('pagination.previous') }}</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="pag-btn">{{ __('pagination.previous') }}</a>
        @endif

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="pag-btn">{{ __('pagination.next') }}</a>
        @else
            <span class="pag-btn pag-disabled">{{ __('pagination.next') }}</span>
        @endif
    </div>

    {{-- Desktop --}}
    <div class="pag-desktop">

        {{-- Info --}}
        <div class="pag-info">
            {!! __('Showing') !!}
            <span class="pag-bold">{{ $paginator->firstItem() }}</span>
            {!! __('to') !!}
            <span class="pag-bold">{{ $paginator->lastItem() }}</span>
            {!! __('of') !!}
            <span class="pag-bold">{{ $paginator->total() }}</span>
            {!! __('results') !!}
        </div>

        {{-- Links --}}
        <div class="pag-links">

            {{-- Prev --}}
            @if ($paginator->onFirstPage())
                <span class="pag-btn pag-disabled" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="pag-btn" rel="prev">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                </a>
            @endif

            {{-- Pages --}}
            @foreach ($elements as $element)
                @if (is_string($element))
                    <span class="pag-btn pag-dots">{{ $element }}</span>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="pag-btn pag-active" aria-current="page">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="pag-btn">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="pag-btn" rel="next">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            @else
                <span class="pag-btn pag-disabled" aria-disabled="true">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" width="14" height="14">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </span>
            @endif

        </div>
    </div>
</nav>

<style>
.pag-nav { width: 100%; }

.pag-mobile {
    display: flex;
    justify-content: space-between;
    gap: 8px;
}
@media (min-width: 640px) { .pag-mobile { display: none; } }

.pag-desktop {
    display: none;
    align-items: center;
    justify-content: space-between;
}
@media (min-width: 640px) { .pag-desktop { display: flex; } }

.pag-info {
    font-size: 12px;
    color: #5a8a90;
}
.pag-bold { font-weight: 700; color: #0f1923; }

.pag-links {
    display: flex;
    gap: 4px;
    align-items: center;
}

/* Base button */
.pag-btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 34px;
    height: 34px;
    padding: 0 10px;
    border-radius: 8px;
    font-size: 13px;
    font-weight: 600;
    font-family: inherit;
    text-decoration: none;
    border: 1.5px solid #CCFBF1;
    color: #0D9488;
    background: #ffffff;
    cursor: pointer;
    transition: all 0.15s;
    line-height: 1;
}

.pag-btn:hover {
    background: #F0FDFA;
    border-color: #0ABFBC;
    color: #0ABFBC;
}

/* Active */
.pag-active {
    background: #0ABFBC !important;
    border-color: #0ABFBC !important;
    color: #ffffff !important;
    cursor: default;
}

/* Disabled */
.pag-disabled {
    background: #F0FDFA !important;
    color: #99c4c8 !important;
    border-color: #CCFBF1 !important;
    cursor: not-allowed;
}

/* Dots */
.pag-dots {
    border: none !important;
    background: transparent !important;
    color: #5a8a90 !important;
    cursor: default;
}

.pag-btn svg {
    stroke: currentColor;
    flex-shrink: 0;
}
</style>
@endif