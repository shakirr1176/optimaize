
    <div class="w-full px-4">
        <x-forms.text id="title" name="title" value="">
            <x-slot name="label">{{ __('Title') }}</x-slot>
            <x-slot name="error">{{ $errors->first('title') }}</x-slot>
        </x-forms.text>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.select
            name="is_published"
            value="0"
            :options="$announcementStatusEnum">

            <x-slot name="label" class="font-16">{{ __('Status') }}</x-slot>
            <x-slot name="error">{{ $errors->first('is_published') }}</x-slot>
        </x-forms.select>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.textarea id="description" name="description" value="">
            <x-slot name="label">{{ __('Description') }}</x-slot>
            <x-slot name="error">{{ $errors->first('description') }}</x-slot>
        </x-forms.textarea>
    </div>
