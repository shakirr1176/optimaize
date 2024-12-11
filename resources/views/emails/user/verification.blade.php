@php
$link = url()->temporarySignedRoute('account.verification', now()->addMinutes(30), ['user_id' => $user->id]);
@endphp
@component('mail::message')
# {{ __('Hello') }}, {{ $user->full_name }}

{{ __('Click the following link to verify your account.') }}

@component('mail::button', ['url' => $link])
{{ __('Verify') }}
@endcomponent

{{ __('Thanks a lot for being with us.') }}<br>
{{ config('app.name') }}

@component('mail::subcopy')
{{ __('Link will be expire within 30 minutes.') }}<br>
{{ __("If you're having trouble clicking the verify button, copy and paste the URL below into your web browser:") }}
<span class="break-all">
    <a href="{{ $link }}">{{ $link }}</a>
</span>
@endcomponent
@endcomponent
