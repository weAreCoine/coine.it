@if(ceil($paginator->total()/$paginator->perPage()) > 1 && $paginator->currentPage() > 1)
    <a href="{{$paginator->previousPageUrl()}}" class="style-none hover:opacity-100 opacity-60 duration-300"><i class="fa-solid text-sm fa-circle-chevron-left"></i></a>
@endif

<p class="opacity-60">{{__(sprintf('Page %d of %d', $paginator->currentPage(), ceil($paginator->total()/$paginator->perPage())))}} </p>

@if($paginator->hasMorePages())
    <a href="{{$paginator->nextPageUrl()}}" class="style-none hover:opacity-100 opacity-60 duration-300"><i class="fa-solid text-sm fa-circle-chevron-right"></i></a>
@endif
