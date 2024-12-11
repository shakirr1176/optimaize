<div class="px-4 w-full">
    <x-forms.text id="name" name="name" value="">
        <x-slot name="label">{{ __('Name') }}</x-slot>
        <x-slot name="error">{{ $errors->first('name') }}</x-slot>
    </x-forms.text>
</div>
