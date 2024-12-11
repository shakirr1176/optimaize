<label class="lara-label">{{ $label }}</label>
<input {{ $attributes->merge(['class' => 'lara-input dark:bg-lara-primary bg-white dark:border-none w-full']) }} name="{{ $name }}" type="{{ isset($type) ? $type : 'text'}}">
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>

