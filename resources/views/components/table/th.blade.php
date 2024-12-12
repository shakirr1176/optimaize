@props([
    'sortableColumn' => '',
    'order' => 'none',
])

@aware(['pageName' => 'p'])

@php
    $ord = get_query_param($pageName.'-sort-ord');
    if($ord){
        $order = $ord;
    }

    $isItSorted = $sortableColumn && $sortableColumn == get_query_param($pageName.'-sort-col');
    $btnOrd = "asc";
    if($order=="asc" && $isItSorted){
        $btnOrd = "desc";
    }elseif($order == "desc" && $isItSorted){
        $btnOrd = "none";
    }elseif($order == "none"){
        $btnOrd = "asc";
    }
@endphp
<th {{ $attributes->merge(['class' => '2xl:pt-3 pt-2.5 font-14 font-medium px-4']) }}>
    @if($sortableColumn)
        <a href="{{ generate_filter_url(["{$pageName}-sort-col" => $sortableColumn, "{$pageName}-sort-ord"=> $btnOrd]) }}">
        <div class="relative">
            <span class="block">{{ $slot }}</span>
            <div class="tableArrow flex flex-col font-14 absolute top-1/2 -translate-y-1/2 -right-4">
                @if ($order == 'desc' && $isItSorted)
                    @svg('heroicon-s-chevron-up', 'w-2.5 text-primary')
                @else
                    @svg('heroicon-s-chevron-up', 'w-2.5')
                @endif

                @if ($order == 'asc' && $isItSorted)
                    @svg('heroicon-s-chevron-down', 'w-2.5 text-primary')
                @else
                    @svg('heroicon-s-chevron-down', 'w-2.5')
                @endif
            </div>
        </div>
        </a>
    @else
        <span>{{ $slot }}</span>
    @endif
</th>
