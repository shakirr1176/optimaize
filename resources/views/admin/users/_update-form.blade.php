<div class="lg:w-1/2 w-full px-4">
    <x-forms.text id="first_name" name="first_name" value="">
        <x-slot name="label">{{ __('First Name') }}</x-slot>
        <x-slot name="error">{{ $errors->first('first_name') }}</x-slot>
    </x-forms.text>
</div>
<div class="lg:w-1/2 w-full px-4 mt-4 md:mt-0">
    <x-forms.text id="last_name" name="last_name" value="">
        <x-slot name="label">{{ __('Last Name') }}</x-slot>
        <x-slot name="error">{{ $errors->first('last_name') }}</x-slot>
    </x-forms.text>
</div>

<div class="lg:w-1/2 w-full px-4 mt-4 2xl:mt-6">
    <x-forms.select id="assigned_role" name="assigned_role" value="" :options="get_user_roles()">

        <x-slot name="label" class="font-16">{{ __('Assigned Role') }}</x-slot>
        <x-slot name="error">{{ $errors->first('assigned_role') }}</x-slot>
    </x-forms.select>
</div>
<div class="lg:w-1/2 w-full px-4 mt-4 2xl:mt-6">
    <x-forms.select id="is_active" name="is_active" value="" :options="$booleanStatusEnum">

        <x-slot name="label" class="font-16">{{ __('Status') }}</x-slot>
        <x-slot name="error">{{ $errors->first('is_active') }}</x-slot>
    </x-forms.select>
</div>
