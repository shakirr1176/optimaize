@props(['options', 'value'])

<label {{ $label->attributes->merge(['class' => 'lara-label']) }}>{{ $label }}</label>
<div id="{{ $attributes->get('id') }}" class="crud-select form-arwa relative {{ $attributes->get('class') }}">
    <span>
        @svg('heroicon-s-chevron-down', 'w-4 font-thin text-black-50')
    </span>

    <select name="{{ $attributes->get('name') }}" class="search-select" data-replace="jselect" data-locale="en"
        data-search="true" data-placeholder="Searching...">
        <option>{{ __("Please Select") }}</option>
        @foreach ($options as $key => $option)
            <option class="searchOption" {{ $value == $key ? 'selected' : '' }} value="{{ $key }}">{{ ucfirst($option) }}</option>
        @endforeach
    </select>
</div>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error ?? '' }}</p>
