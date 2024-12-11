<a href="{{ $href }}" {{ $attributes->merge(['class' => 'text-center font-16 text-black-80 block hover:bg-primary hover:bg-opacity-20 rounded hover:text-primary px-1.5 py-1 w-full confirmation']) }}>
    {{ $slot }}
</a>
