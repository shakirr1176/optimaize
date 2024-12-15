<label class="lara-label" for="">{{ $label }}</label>
<textarea {{ $attributes->merge(['class' => 'lara-input']) }}
    name="{{ $name }}" rows="5" type="address">
    {{ $slot }}
</textarea>
@if (isset($error))
<p class="error-message">{{ $error }}</p>
@endif

