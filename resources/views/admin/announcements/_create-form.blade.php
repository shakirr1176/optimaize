
    <div class="col-span-12">
        <x-forms.text id="title" name="title" value="">
            <x-slot name="label">{{ __('Title') }}</x-slot>
        </x-forms.text>
        <p class="title error-message"></p>
    </div>
    <div class="col-span-12">
        <x-forms.select
            name="is_published"
            value="0"
            :options="$announcementStatusEnum">
            <x-slot name="label" class="font-16">{{ __('Status') }}</x-slot>
        </x-forms.select>
        <p class="is_published error-message"></p>
    </div>
    <div class="col-span-12">
        <x-forms.textarea id="description" name="description" value="">
            <x-slot name="label">{{ __('Description') }}</x-slot>
        </x-forms.textarea>
        <p class="description error-message"></p>
    </div>
