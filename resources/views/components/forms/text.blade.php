<label class="lara-label">{{ $label }}</label>
<input {{ $attributes->merge(['class' => 'lara-input']) }} name="{{ $name }}" type="{{ isset($type) ? $type : 'text'}}">
@if (isset($error))
<p class="error-message">{{ $error }}</p>
@endif

