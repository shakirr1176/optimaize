
    <div class="w-full px-4">
        <x-forms.text id="name" name="name" value="">

            <x-slot name="label">{{ __('Name') }}</x-slot>
            <x-slot name="error">{{ $errors->first('name') }}</x-slot>
        </x-forms.text>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.text id="short_code" name="short_code" value="">

            <x-slot name="label">{{ __('Short Code') }}</x-slot>
            <x-slot name="error">{{ $errors->first('short_code') }}</x-slot>
        </x-forms.text>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.select id="is_active" name="is_active" value="" :options="$booleanStatus">

            <x-slot name="label" class="font-16">{{ __('Status') }}</x-slot>
            <x-slot name="error">{{ $errors->first('is_active') }}</x-slot>
        </x-forms.select>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.select id="is_rtl" name="is_rtl" value="" :options="get_language_direction()">

            <x-slot name="label" class="font-16">{{ __('Direction') }}</x-slot>
            <x-slot name="error">{{ $errors->first('is_rtl') }}</x-slot>
        </x-forms.select>
    </div>
    {{-- <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.radio id="direction" name="is_rtl" value="" isChecked="" :options="get_language_direction()">

            <x-slot name="label">{{ __('Direction') }}</x-slot>
            <x-slot name="error">{{ $errors->first('is_rtl') }}</x-slot>
        </x-forms.radio>
    </div> --}}
    <div class="w-full px-4 mt-4 2xl:mt-6 parentImgUploadDiv">
        <x-forms.image type="file" name="icon" value="" id="icon">

            <x-slot name="label" class="font-16">{{ __('Icon') }}</x-slot>
            <x-slot name="error">{{ $errors->first('icon') }}</x-slot>
        </x-forms.image>
    </div>
