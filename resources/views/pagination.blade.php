@if ($paginator->lastPage() > 1)
	<?php
        $start = $paginator->currentPage() - 3; // show 3 pagination links before current
        $end = $paginator->currentPage() + 3; // show 3 pagination links after current
        if($start < 1) $start = 1; // reset start to 1
        if($end >= $paginator->lastPage() ) $end = $paginator->lastPage(); // reset end to last page
    ?>
<ul class="pagination">
	<li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()-3) }}"> << </a>
    </li>
    <li class="{{ ($paginator->currentPage() == 1) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()-1) }}">Previous</a>
    </li>
    
    <!-- @if($start>1)
    <li>
        <a href="{{ $paginator->url(1) }}">{{1}}</a> ...
    </li>
    @endif -->
    @for ($i = $start; $i <= $end; $i++)
        <li class="{{ ($paginator->currentPage() == $i) ? ' active' : '' }}">
            <a href="{{ $paginator->url($i) }}">{{ $i }}</a>
        </li>
    @endfor
    <!-- @if($end<$paginator->lastPage())
    <li>
       ... <a href="{{ $paginator->url($paginator->lastPage()) }}">{{$paginator->lastPage()}}</a>
    </li>
    @endif -->
    
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+1) }}" >Next</a>
    </li>
    <li class="{{ ($paginator->currentPage() == $paginator->lastPage()) ? ' disabled' : '' }}">
        <a href="{{ $paginator->url($paginator->currentPage()+3) }}" > >> </a>
    </li>
</ul>
@endif


