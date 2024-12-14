<div class="flex items-center justify-center">
    <button {{ $attributes->merge(['class' => 'bg-optm-purple hover:bg-optm-purple/80 text-white lara-btn w-full font-medium']) }}>
        {{ $slot }}
    </button>
</div>
