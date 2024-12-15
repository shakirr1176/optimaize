<label class="lara-label" for="">{{ $label }}</label>
<textarea {{ $attributes->merge(['class' => 'lara-input']) }}
    name="{{ $name }}" rows="5" type="address">
    {{ $slot }}
</textarea>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>

