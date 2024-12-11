@extends('errors::layout')
@section('title', __('Error'))
@section('content')
    <img class="mx-auto object-cover w-48" src="{{ Vite::image('errors/404.png') }}" alt="">
    <h1 class="text-center text-white font-44 2xl:mt-5 lg:mt-4 mt-3">{{ __('Error') }}</h1>
    <p class="w-full text-center mx-auto text-black-20 2xl:mb-7 lg:mb-5 mb-4 2xl:mt-4 mt-2 font-16">
        {{ __('Page Not Found') }}
    </p>
@endsection
