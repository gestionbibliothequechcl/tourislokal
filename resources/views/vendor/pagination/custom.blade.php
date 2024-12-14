@if ($paginator->hasPages())
    <div class="pagination flex-wr-s-c m-rl--7 p-t-15">
        {{-- Lien précédent --}}
        @if ($paginator->onFirstPage())
            <span class="disabled p-lr-15">&laquo;</span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="p-lr-15">&laquo;</a>
        @endif

        {{-- Liens des pages --}}
        @foreach ($elements as $element)
            {{-- "..." lorsqu'il y a une séparation --}}
            @if (is_string($element))
                <span class="disabled p-lr-15">{{ $element }}</span>
            @endif

            {{-- Liens numériques --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="active p-lr-15">{{ $page }}</span>
                    @elseif($page <= 6 || $page >= $paginator->lastPage() - 1 || ($page >= $paginator->currentPage() - 2 && $page <= $paginator->currentPage() + 2))
                        <a href="{{ $url }}" class="p-lr-15">{{ $page }}</a>
                    @elseif ($page == 7)
                        {{-- Afficher les points de suspension --}}
                        <span class="p-lr-15">...</span>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Lien suivant --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="p-lr-15">&raquo;</a>
        @else
            <span class="disabled p-lr-15">&raquo;</span>
        @endif
    </div>
@endif
