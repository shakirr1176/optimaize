@props([
    'name' => $name,
    'options' => $options,
    'isChecked' => $isChecked
])

@php
    if(!isset($id)){
        $id = random_int(50,100);
    }
@endphp

<label class="lara-label font-16">{{ $label }}</label>
<div class="flex flex-wrap items-center mt-4 space-x-12">
    @foreach ($options as $key => $value)
        <div class="flex items-center">
            <input class="appearance-none hidden approve" type="radio" id="Approve{{ $id.$loop->iteration }}" name="{{ $name }}" value="{{ $key }}" {{ $isChecked == $key ? 'checked' : '' }}  {{ empty($isChecked) && $loop->first ? 'checked' : '' }}>
            <label class="cursor-pointer text-sm flex items-center" for="Approve{{ $id.$loop->iteration }}">
                <span class="2xl:w-6 w-5 2xl:h-6 h-5 rounded-full border-2 border-lara-gray mr-4 bg-transparent flex items-center justify-center">
                <span class="2xl:w-4 w-2.5 2xl:h-4 h-2.5 duration-300 dark:bg-optm-purple bg-lara-gray-400 rounded-full block"></span>
                </span>
                <span class="block font-14 font-medium text-dark_2/80 dark:text-branco-sujo capitalize">{{ $value }}</span>
            </label>
        </div>
    @endforeach
</div>
<p class="text-sm text-red-600 mt-2 error-message">{{ $error }}</p>

