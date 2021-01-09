

@if ($paginator->hasPages())
    <ul class="pagination custom" >
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>«</span></li>
        @else
            <li><a class="custom-length" href="{{ $paginator->previousPageUrl() }}" rel="prev">«</a></li>
        @endif

        @if($paginator->currentPage() > 10)
            <li class="hidden-xs"><a href="{{ $paginator->url(1) }}">{{ 1 }}</a></li>
            @endif
        @if($paginator->currentPage() > 11)
            <li><span class="hidden-xs">...</span></li>
        @endif

        @foreach(range(1, $paginator->lastPage()) as $i)
            @if($paginator->currentPage() < 12 )
                @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9 +(12 - $paginator->currentPage()))
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a class="hidden-xs" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif

            @elseif($paginator->currentPage() > 11  &&  $paginator->currentPage() <= $paginator->lastPage() - 11)
                @if($i >= $paginator->currentPage() - 9 && $i <= $paginator->currentPage() + 9)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a class="hidden-xs" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @else
                @if($i > $paginator->lastPage() - 21)
                    @if ($i == $paginator->currentPage())
                        <li class="active"><span>{{ $i }}</span></li>
                    @else
                        <li><a class="hidden-xs" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>
                    @endif
                @endif
            @endif
        @endforeach

        @if($paginator->currentPage() < $paginator->lastPage() - 10)
            <li><span class="hidden-xs">...</span></li>
            <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>
        @endif

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">»</a></li>
        @else
            <li class="disabled"><span>»</span></li>
        @endif
    </ul>
@endif
{{--@if($paginator->currentPage() > 20)--}}
{{--    <li class="hidden-xs "><a href="{{ $paginator->url(1) }}">1</a></li>--}}
{{--@endif--}}
{{--@if($paginator->currentPage() > 21)--}}
{{--    <li><span>...</span></li>--}}
{{--@endif--}}
{{--@foreach(range(1, $paginator->lastPage()) as $i)--}}
{{--    @if($paginator->currentPage()<10 )--}}
{{--        @if($i >= $paginator->currentPage() - 10 && $i <= $paginator->currentPage() + 10 +(10 - $paginator->currentPage()))--}}
{{--            @if ($i == $paginator->currentPage())--}}
{{--                <li class="active"><span>{{ $i }}</span></li>--}}
{{--            @else--}}
{{--                <li><a class="custom-length" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    @elseif($paginator->currentPage()>10 )--}}
{{--        @if($i >= $paginator->currentPage() - 10 && $i <= $paginator->currentPage() + 10)--}}
{{--            @if ($i == $paginator->currentPage())--}}
{{--                <li class="active custom-length"><span>{{ $i }}</span></li>--}}
{{--            @else--}}
{{--                <li><a class="custom-length "  href="{{ $paginator->url($i) }}">{{ $i }}</a></li>--}}
{{--            @endif--}}
{{--        @endif--}}

{{--    @elseif($paginator->currentPage() > ($paginator->lastPage() - 10))--}}
{{--        @if($i >= $paginator->currentPage() - 8 -($paginator->lastPage()- $paginator->currentPage() )  && $i <= $paginator->currentPage() + 8)--}}
{{--            @if ($i == $paginator->currentPage())--}}
{{--                <li class="active custom-length" ><span>{{ $i }}</span></li>--}}
{{--            @else--}}
{{--                <li><a class="custom-length" href="{{ $paginator->url($i) }}">{{ $i }}</a></li>--}}
{{--            @endif--}}
{{--        @endif--}}
{{--    @endif--}}
{{--@endforeach--}}
{{--@if($paginator->currentPage() < $paginator->lastPage() - 3)--}}
{{--    <li><span>...</span></li>--}}
{{--@endif--}}
{{--@if($paginator->currentPage() < $paginator->lastPage() - 2)--}}
{{--    <li class="hidden-xs"><a href="{{ $paginator->url($paginator->lastPage()) }}">{{ $paginator->lastPage() }}</a></li>--}}
{{--@endif--}}
