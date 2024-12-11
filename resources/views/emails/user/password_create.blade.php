@component('mail::message')
# {{ __('Hello') }}, {{ $user->fullName }}

{{ __('Your account has been created on ') }} <a href="{{ url('/') }}">{{ config('app.name') }}</a>

<ul style="list-style: none">
    <li>{{ __('Email') }} : {{ $user->email }}</li>
</ul>

{{ __('Click the following link to create password for your account.') }}

@component('mail::button', [
'url' => url()->temporarySignedRoute('account.password.create', now()->addDay(), ['user' => $user->id])])
{{ __('Create') }}
@endcomponent

{{ __('Thanks a lot for being with us,') }}<br>
{{ config('app.name') }}
@component('mail::subcopy')
{{ __('Link will be expire within 24 hours.') }}<br>
{{ __("If you're having trouble clicking the create button, copy and paste the URL below into your web browser:") }}
<span class="break-all">
    <a
        href="{{ url()->temporarySignedRoute('account.password.create', now()->addDay(), ['user' => $user->id]) }}">
        {{ url()->temporarySignedRoute('account.password.create', now()->addDay(), ['user' => $user->id]) }}
    </a>
</span>
@endcomponent
@endcomponent
