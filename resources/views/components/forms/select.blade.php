@props(['options', 'value'])

<label {{ $label->attributes->merge(['class' => 'lara-label']) }}>{{ $label }}</label>
<div id="{{ $attributes->get('id') }}" class="custom-select relative w-full {{ $attributes->get('class') }}">
    <span>
        @svg('heroicon-s-chevron-down', 'w-4 font-thin')
    </span>

    <select name="{{ $attributes->get('name') }}">
        <option>{{ __("Please Select") }}</option>
        @foreach ($options as $key => $option)
            <option {{ $value == $key ? 'selected' : '' }} value="{{ $key }}">{{ ucfirst($option) }}</option>
        @endforeach
    </select>
</div>
@if (isset($error))
<p class="error-message">{{ $error }}</p>
@endif

