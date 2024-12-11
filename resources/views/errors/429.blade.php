@extends('errors::layout')
@section('title', __('Too Many Request'))
@section('content')
    <img class="mx-auto object-cover w-48" src="{{ Vite::image('errors/429.png') }}" alt="">
    <h1 class="text-center text-white font-44 2xl:mt-5 lg:mt-4 mt-3">{{ __('Too Many Request') }}</h1>
    <p class="w-full text-center mx-auto text-black-20 2xl:mb-7 lg:mb-5 mb-4 2xl:mt-4 mt-2 font-16">
        {{ __('Too Many Requests! Response status code indicates the user has sent too many requests in a given amount of time') }}
    </p>
@endsection
