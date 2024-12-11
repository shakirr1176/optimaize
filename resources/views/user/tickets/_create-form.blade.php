<div class="row">
    <div class="w-full px-4">
        <x-forms.text class="darkblack-imp" id="title" name="title" value="{{ isset($ticket->title) ? $ticket->title : '' }}">
            <x-slot name="label">{{ __('Heading') }}</x-slot>
            <x-slot name="error">{{ $errors->first('title') }}</x-slot>
        </x-forms.text>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6">
        <x-forms.textarea class="darkblack-imp" id="content" name="content" value="{{ isset($ticket->content) ? $ticket->content : '' }}">
            <x-slot name="label">{{ __('Description') }}</x-slot>
            <x-slot name="error">{{ $errors->first('content') }}</x-slot>
        </x-forms.textarea>
    </div>
    <div class="w-full px-4 mt-4 2xl:mt-6 parentImgUploadDiv">
        <x-forms.image class="darkblack-imp" type="file" name="attachment" value="" id="attachment">
            <x-slot name="label" class="font-16">{{ __('Attachment') }}</x-slot>
            <x-slot name="error">{{ $errors->first('attachment') }}</x-slot>
        </x-forms.image>
    </div>
    <div class="w-full px-4 mt-6">
        <x-forms.button class="darkblack-imp" class="bg-lara-blue font-16 font-semibold" type="submit">
            {{ $buttonText }}
        </x-forms.button>
    </div>
</div>

