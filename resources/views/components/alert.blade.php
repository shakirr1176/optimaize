@props([
    'type' => 'info',
])

@php
    $alert = config('alert.' . $type);
@endphp

<div class="alert-box duration-500 overflow-hidden w-full">
    <div
        {{ $attributes->merge(['class' => 'flex space-x-3 items-center relative ' . $alert['bg_color'] . ' ' . $alert['border_color'] . ' bg-opacity-20 border-l-4 p-5']) }}>
        {!! $alert['icon'] !!}
        <div class="text-sm {{ $alert['text_color'] }}">
            {{ $slot }}
        </div>
        <button class="absolute top-1/2 transform -translate-y-1/2 right-4 alert-close-btn">
            <svg class="fill-current h-6 w-6 {{ $alert['text_color'] }}" role="button" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
                <title>Close</title>
                <path
                    d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z">
                </path>
            </svg>
        </button>
    </div>
</div>
