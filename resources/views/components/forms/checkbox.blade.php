@props([
    'name' => $name,
    'options' => $options,
    'isChecked' => $isChecked,
])

@php
    if (!isset($id)) {
        $id = random_int(50, 100);
    }
@endphp

<label class="lara-label">{{ $label }}</label>
@foreach ($options as $key => $value)
    <div {{ $attributes->merge(['class' => 'mb-6']) }}>
        <label class="flex cursor-pointer font-14 font-medium text-black-50 capitalize items-center justify-center rounded " for="Approve{{ $id.$loop->iteration }}">
            <input class="peer/draft hidden appearance-none" type="checkbox" id="Approve{{ $id.$loop->iteration }}" name="{{ $name }}" value="{{ $key }}" {{ $isChecked == $key ? 'checked' : '' }}  {{ empty($isChecked) && $loop->first ? 'checked' : '' }}>
            {{ $svg}}
            <span class="ml-3 peer-checked/draft:text-lara-blue">{{ $value }}</span>
        </label>
    </div>
@endforeach
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>
