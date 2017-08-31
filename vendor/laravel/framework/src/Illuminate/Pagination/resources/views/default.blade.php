<?php
$var = "&";
foreach(explode('&', $_SERVER['QUERY_STRING']) as $dato){
    if(strpos($dato, 'page')===false){
        if($dato!=""){
            $var = $var.'&'.$dato;
        }
    }
}

if($var=='&'){
    $var="";
}
?>
@if ($paginator->hasPages())

    <ul class="pagination">

        {{-- Previous Page Link --}}

        @if ($paginator->onFirstPage())

            <li class="disabled"><span><i class="fa fa-arrow-circle-left"></i></span></li>

        @else

            <li><a href="{{ $paginator->previousPageUrl().$var }}" rel="prev"><i class="fa fa-arrow-circle-left"></i></a></li>

        @endif



        {{-- Pagination Elements --}}

        @foreach ($elements as $element)

            {{-- "Three Dots" Separator --}}

            @if (is_string($element))

                <li class="disabled"><span>{{ $element }}</span></li>

            @endif



            {{-- Array Of Links --}}

            @if (is_array($element))

                @foreach ($element as $page => $url)

                    @if ($page == $paginator->currentPage())

                        <li class="active"><span>{{ $page }}</span></li>

                    @else

                        <li><a href="{{ $url.$var }}">{{ $page }}</a></li>

                    @endif

                @endforeach

            @endif

        @endforeach



        {{-- Next Page Link --}}

        @if ($paginator->hasMorePages())
            <li><a href="{{ $paginator->nextPageUrl().$var}}" rel="next"><i class="fa fa-arrow-circle-right"></i></a></li>
        @else

            <li class="disabled"><span><i class="fa fa-arrow-circle-right"></i></span></li>

        @endif

    </ul>

@endif

