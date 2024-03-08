<nav class="d-flex justify-content-center">
    <ul class="pagination">
        @if ($events->currentPage() > 1)
            <li class="page-item"><a class="page-link" href="{{ $events->path() . $events->currentPage() - 1 }}">Previous</a>
            </li>
        @else
            <li class="page-item disabled"><a class="page-link"
                    href="{{ $events->path() . $events->currentPage() - 1 }}">Previous</a>
            </li>
        @endif

        @for ($i = 1; $i <= $events->lastPage(); $i++)
            <li class="page-item"><a class="page-link" href={{ $events->path() . $i }}>{{ $i }}</a></li>
        @endfor
        @if ($events->currentPage() < $events->lastPage())
            <li class="page-item"><a class="page-link" href="{{$events->path() . $events->currentPage() + 1 }}">Next</a></li>
        @else
            <li class="page-item disabled"><a class="page-link"
                    href="{{ $events->path() . $events->currentPage() + 1 }}">Next</a></li>
        @endif



    </ul>
</nav>
