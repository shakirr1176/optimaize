<label class="lara-label" for="">{{ $label }}</label>
<textarea {{ $attributes->merge(['class' => 'lara-input outline-none px-4 py-4 w-full font-16 text-text-50 dark:bg-lara-primary bg-white dark:border-none']) }}
    name="{{ $name }}" rows="5" type="address">
    {{ $slot }}
</textarea>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>

