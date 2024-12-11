<button id="{{ $id }}" value="{{ $value }}" type="{{ $type ?? '' }}" {{ $attributes->merge(['class' => 'editBtn text-center font-16 text-black-80 block hover:bg-primary hover:bg-opacity-20 rounded hover:text-primary px-1.5 py-1 w-full']) }}>
    {{ $slot}}
</button>
