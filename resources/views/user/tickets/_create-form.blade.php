<div class="grid grid-cols-1 gap-4 2xl:gap-6">
    <div>
        <x-forms.text id="title" name="title" value="{{ isset($ticket->title) ? $ticket->title : '' }}">
            <x-slot name="label">{{ __('Heading') }}</x-slot>
            <x-slot name="error">{{ $errors->first('title') }}</x-slot>
        </x-forms.text>
    </div>
    <div>
        <x-forms.textarea id="content" name="content" value="{{ isset($ticket->content) ? $ticket->content : '' }}">
            <x-slot name="label">{{ __('Description') }}</x-slot>
            <x-slot name="error">{{ $errors->first('content') }}</x-slot>
        </x-forms.textarea>
    </div>
    <div class="parentImgUploadDiv">
        <x-forms.image type="file" name="attachment" value="" id="attachment">
            <x-slot name="label" class="font-16">{{ __('Attachment') }}</x-slot>
            <x-slot name="error">{{ $errors->first('attachment') }}</x-slot>
        </x-forms.image>
    </div>
    <div>
        <x-forms.button class="lara-submit-btn px-10" type="submit">
            {{ $buttonText }}
        </x-forms.button>
    </div>
</div>

