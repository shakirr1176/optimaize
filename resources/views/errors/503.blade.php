@extends('errors::layout')
@section('title', __('Service Unavailable'))
@section('content')
    <h1 class="text-center text-white font-44 2xl:mt-5 lg:mt-4 mt-3">{{ __('Service Unavailable') }}</h1>
    <p class="w-full text-center mx-auto text-black-20 2xl:mb-7 lg:mb-5 mb-4 2xl:mt-4 mt-2 font-16">
        {{ __('Service Unavailable! Server error response code indicates that the server is not ready to handle the request') }}
    </p>
@endsection
