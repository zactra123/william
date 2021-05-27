

@if ($paginator->hasPages())
    <ul class="pagination custom w-100" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>«</span></li>
        @else
            <li><a class="custom-length" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @if($paginator->currentPage() > 10)
            <li ><a href="{{ $paginator->url(1) }}">{{ 1 }}</a></li>
            @endif
        @if($paginator->currentPage() > 11)
            <li><span>...</span></li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($paginator->currentPage() < 12 )
                @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9 +(12 - $paginator->currentPage()))
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a  href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif

            @elseif($paginator->currentPage() > 11  &&  $paginator->currentPage() <= $paginator->lastPage() - 11)
                @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a  href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @else
                @if($i > $paginator->lastPage() - 21)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a  href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 10)
            <li><span >...</span></li>
            <li ><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled"><span>»</span></li>
        @endif
    </ul>

    <div class="row page-navigation-container">
        <div class="col-md-9 ">
        </div>
        <div class="col-md-3 p-0">
            <div class="col-md-8 p-1">
                <input class="form-control go-to-page" type="text" id="" name="page_number" placeholder="PAGE #">
            </div>
            <div class="col-md-4 p-1 pl-2 ">
                <button class="form-control go-to" id="">GO TO</button>
            </div>

        </div>
    </div>
@endif

