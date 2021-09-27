@if ($paginator->hasPages())
<nav aria-label="Page navigation example" style="float:right">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Pre</a></li>
    @if($paginator->currentPage() > 10)
      <li class="page-item"><a class="page-link" href="{{ $paginator->url(1) }}">1</a></li>
    @endif
    @if($paginator->currentPage() > 11)
      <li class="page-item"><a class="page-link" href="#">...</a></li>
    @endif
    @foreach(range(1, $paginator->lastPage()) as $i)
      @if($paginator->currentPage() < 12 )
        @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9 +(12 - $paginator->currentPage()))
          @if ($i == $paginator->currentPage())
            <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
          @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
          @endif
        @endif
      @elseif($paginator->currentPage() > 11  &&  $paginator->currentPage() <= $paginator->lastPage() - 11)
        @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9)
          @if ($i == $paginator->currentPage())
            <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
          @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
          @endif
        @endif
      @else
        @if($i > $paginator->lastPage() - 21)
          @if ($i == $paginator->currentPage())
            <li class="page-item active"><a class="page-link" href="#">{{ $i }}</a></li>
          @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
          @endif
        @endif
      @endif
    @endforeach
    @if($paginator->currentPage() < $paginator->lastPage() - 10)
      <li class="page-item"><a class="page-link" href="#">...</a></li>
      <li class="page-item"><a class="page-link" href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
    @endif
    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
      <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}">Next</a></li>
    @else
      <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
    @endif
  </ul>
</nav>

@endif
