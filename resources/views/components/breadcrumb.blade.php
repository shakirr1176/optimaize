@props(['border' => false])

<div class="w-full my-8 2xl:my-10">
    
    @isset($above)
        {{ $above }}
    @endisset

    <div class="@if($border) border-b border-gray-200 @endif py-2 flex flex-wrap gap-x-4 gap-y-2 items-center justify-between">
        <div>
            <h1 class="font-bold font-34 capitalize">{{ $slot }}</h1>

            @isset($below)
                {{ $below }}
            @endisset
        </div>
        @isset($right)
            {{ $right }}
        @endisset
    </div>
</div>
