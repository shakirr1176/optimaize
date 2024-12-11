{{-- <tr {{ $attributes->merge(['class' => 'text-left [&>*:nth-child(2)]:pl-0 [&>*:nth-child(2)]:border-l-0 whitespace-nowrap bg-white dark:bg-lara-darkBlack']) }}> --}}
<tr {{ $attributes->merge(['class' => 'text-left whitespace-nowrap bg-white dark:bg-lara-darkBlack']) }}>
    {{ $slot }}
</tr>
