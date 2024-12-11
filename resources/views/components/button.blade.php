<div class=" flex items-center justify-center mt-4 mb-3">
    <button {{ $attributes->merge(['class' => 'text-white bg-lara-blue lara-btn w-full font-medium']) }}>
        {{ $slot }}
    </button>
</div>
