<div class="col-span-12 lg:col-span-6">
    <x-forms.text id="first_name" name="first_name" value="">
        <x-slot name="label">{{ __('First Name') }}</x-slot>
    </x-forms.text>
    <p class="first_name error-message"></p>
</div>
<div class="col-span-12 lg:col-span-6">
    <x-forms.text id="last_name" name="last_name" value="">
        <x-slot name="label">{{ __('Last Name') }}</x-slot>
    </x-forms.text>
    <p class="last_name error-message"></p>

</div>
<div class="col-span-12 lg:col-span-6">
    <x-forms.text id="email" name="email" type="email" value="">
        <x-slot name="label">{{ __('Email') }}</x-slot>
    </x-forms.text>
    <p class="email error-message"></p>
</div>
{{-- <div class="col-span-12 lg:col-span-6">
    <x-forms.select id="assigned_role" name="assigned_role" value="" :options="get_user_roles()">

        <x-slot name="label" class="font-16">{{ __('Assigned Role') }}</x-slot>
        <x-slot name="error">{{ $errors->first('assigned_role') }}</x-slot>
    </x-forms.select>
</div> --}}
