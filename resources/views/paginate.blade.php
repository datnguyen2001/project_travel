@if ($paginator->hasPages())
    <!-- Pagination -->
    <div class="pagination-group">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item">
                        <button class="page-link disabled" aria-label="Previous">
                            <span aria-hidden="true">❮</span>
                            <span class="sr-only">Previous</span>
                        </button>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous">
                            <span aria-hidden="true">❮</span>
                            <span class="sr-only">Previous</span>
                        </a>
                    </li>
                @endif
                @foreach ($elements as $element)
                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            <li class="page-item"><a class="page-link @if ($page == $paginator->currentPage()) active @endif" href="{{ $url }}">{{ $page }}</a></li>
                        @endforeach
                    @endif
                @endforeach
                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                            <span aria-hidden="true">❯</span>
                            <span class="sr-only">Next</span>
                        </a>
                    </li>
                @else
                    <li class="page-item">
                        <button class="page-link disabled" aria-label="Next">
                            <span aria-hidden="true">❯</span>
                            <span class="sr-only">Next</span>
                        </button>
                    </li>
                @endif
            </ul>
        </nav>
    </div>
    <!-- Pagination -->
@endif
