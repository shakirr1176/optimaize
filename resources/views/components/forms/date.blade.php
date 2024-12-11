<label class="lara-label" for="">{{ $label }}</label>
<div class="relative defaultcal">
    <input {{ $attributes->merge(['class' => 'lara-input-date']) }} type="{{ isset($type) ? $type : 'text'}}">
    <div class="pointer-events-none absolute 2xl:right-6 right-4 top-1/2 -translate-y-1/2">
        @svg('heroicon-s-calendar-days', 'w-5 text-black-50')
    </div>
</div>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>
