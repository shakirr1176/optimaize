<div class="w-full my-8 2xl:my-10">
    {{-- Render only if $above is provided --}}
    @isset($above)
        {{ $above }}
    @endisset

    <h1 class="font-bold font-34 capitalize">{{ $slot }}</h1>

    {{-- Render only if $below is provided --}}
    @isset($below)
        {{ $below }}
    @endisset
</div>
