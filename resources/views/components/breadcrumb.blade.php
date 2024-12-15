@props(['border' => false])

<div class="w-full mb-4 2xl:mb-6">

    @isset($above)
        {{ $above }}
    @endisset

    <div class="@if($border) border-b dark:border-dark-optm-gray-300 border-gray-200 @endif py-2 flex flex-wrap gap-x-4 gap-y-2 items-center justify-between">
        <div>
            <h1 class="font-bold font-34 capitalize text-dark_2 dark:text-optm-gray-200">{{ $slot }}</h1>

            @isset($below)
                {{ $below }}
            @endisset
        </div>
        @isset($right)
            {{ $right }}
        @endisset
    </div>
</div>
