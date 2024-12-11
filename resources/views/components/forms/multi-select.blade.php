@props(['options', 'value'])

<label {{ $label->attributes->merge(['class' => 'lara-label']) }}>{{ $label }}</label>
<div id="{{ $attributes->get('id') }}" class="cursor-pointer rounded-l-sm relative w-full border border-black20 {{ $attributes->get('class') }}">
    <span>@svg('heroicon-s-chevron-down', 'w-4 font-thin drop-icon')</span>
    <select class="w-full" multiple search="true" name="{{ $attributes->get('name') }}">
        <option selected value="-100">unwanted</option>
        @foreach ($options as $key => $option)
            <option {{ in_array($key, $value) ? 'selected' : '' }} value="{{ $key }}">{{ ucfirst($option) }}</option>
        @endforeach
    </select>
</div>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error ?? '' }}</p>
