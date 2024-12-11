<a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-black-80 text-center font-16 block hover:bg-primary hover:bg-opacity-20 rounded hover:text-primary px-1.5 py-1 w-full']) }}>
    {{ $slot }}
</a>
