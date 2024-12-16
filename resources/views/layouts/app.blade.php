@php
    use App\Enums\ResponseTypeEnum;
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @hasSection('title')
            @yield('title') | {{ config('app.name') }}
        @else
            {{ config('app.name') }}
        @endif
    </title>
    <link rel="stylesheet" href="{{ Vite::css('app.css') }}">
    <link rel="stylesheet" href="{{ Vite::css('base.css') }}">
    {{-- <link rel="stylesheet" href="{{ Vite::css('base-new.css') }}"> --}}
    <link rel="icon" type="image/x-icon" href="{{ get_favicon_url() }}">

    @yield('style')

</head>

<body class="font-Poppins">
    <div class="gradient-circle"></div>
    <div id="preloader" class="preloader">
        <div id="particles-background" class="vertical-centered-box"></div>
        <div id="particles-foreground" class="vertical-centered-box"></div>

        <div class="vertical-centered-box">
            <div class="content">
                <div class="loader-circle"></div>
                <div class="loader-line-mask">
                    <div class="loader-line"></div>
                </div>
                <svg class="w-5 h-5 dark:text-gray-300 text-dark_1" version="1.1" id="Capa_1"
                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 30.393 30.393" xml:space="preserve" fill="currentColor">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <g>
                            <path
                                d="M14.49,14.623c0,0-3.553-3.459-4.939-7.436V6.105H20.84v1.082c-1.8,4.391-4.939,7.436-4.939,7.436 H14.49z">
                            </path>
                            <path
                                d="M24.91,4.961V3.254h1.619V0H3.864v3.254h1.618v1.707c0,2.607,4.678,9.727,4.899,10.24 c-0.217,0.514-4.899,7.633-4.899,10.229v1.705H3.864v3.258h22.665v-3.258H24.91V25.43c0-2.609-4.682-9.682-4.929-10.234 C20.228,14.643,24.91,7.568,24.91,4.961z M23.291,25.43v1.705H7.1V25.43c0-1.873,4.961-9.295,4.961-10.234S7.1,6.836,7.1,4.961 V3.254h16.19v1.707c0,1.875-5.001,9.295-5.001,10.234S23.291,23.557,23.291,25.43z">
                            </path>
                        </g>
                    </g>
                </svg>
            </div>
        </div>
    </div>
    <div class="main-layout bg-optm-gray-200 dark:bg-dark-optm-gray-200 flex min-h-screen">
        <!-- side menu start -->
        <x-sidebar id="collapse-sidebar" class="group"></x-sidebar>
        <!-- side menu end -->

        <!-- main section start -->
        <div class="main-content overflow-auto p-6 md:p-12 2xl:p-24 2xl:pr-36 w-full !pt-0">
            <!-- header start -->
            <x-header></x-header>


            <!-- header end -->
            <div class="duration-500 w-full">
                @yield('breadcrumb')

                @if (session(ResponseTypeEnum::ERROR->value))
                    <x-alert type="error" class="mt-4">
                        {{ session(ResponseTypeEnum::ERROR->value) }}
                    </x-alert>
                @endif

                @if (session(ResponseTypeEnum::SUCCESS->value))
                    <x-alert type="success" class="mt-4">
                        {{ session(ResponseTypeEnum::SUCCESS->value) }}
                    </x-alert>
                @endif

                @if (session(ResponseTypeEnum::WARNING->value))
                    <x-alert type="warning" class="mt-4">
                        {{ session(ResponseTypeEnum::WARNING->value) }}
                    </x-alert>
                @endif

                <!-- code here -->
                {{ $slot }}
                <!-- code end -->
            </div>
            <!-- footer start -->
            <x-footer></x-footer>
            <!-- footer end -->
            {{-- modal --}}
            <div id="flash-message" class="hidden fixed z-50 overflow-y-auto top-0 w-full h-full left-0 lf-modal-box">
                <div class="fixed inset-0 transition-opacity">
                    <div class="absolute inset-0 bg-gray-700 opacity-75"></div>
                </div>
                <div class="flex items-center justify-center h-full pt-4 px-4 pb-20 text-center sm:p-0">
                    <div id="lf-modal-content"
                        class="lf-modal-content inline-block bg-light-body dark:bg-dark_2 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-6 align-middle sm:max-w-md w-full">
                        <div class="flex w-full">
                            <a href="javascript:"
                                class="lf-close inline-block ml-auto mr-3 mt-2 font-18 text-white hover:text-gray-400">&#10005;</a>
                        </div>
                        <div class="bg-light-body dark:bg-dark_2 px-4 pb-6 text-center">
                            <div id="lf-icon"
                                class="border-4 rounded-full text-5xl inline-flex items-center justify-center">
                            </div>
                            <p id="lf-message" class="font-16 font-semibold dark:text-white text-dark_1"></p>
                        </div>
                        <div id="lf-button" class="font-16 bg-light-body dark:bg-dark_2 p-4 text-center hidden">
                            <button
                                class="lf-close py-2 px-4 bg-black-80 text-white rounded hover:bg-opacity-80 mr-2 flash-close-button"
                                type="button">{{ __('Cancel') }}
                            </button>
                            <button class="lf-confirm py-2 px-4 bg-red-600 text-white rounded hover:bg-opacity-80 mr-2"
                                type="button">{{ __('Confirm') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- main section end -->
    </div>

    <script src="{{ Vite::js('app.js') }}"></script>
    <script src="{{ Vite::js('sidebar.js') }}"></script>
    <script src="{{ Vite::js('theme-switch.js') }}"></script>
    <script src="{{ Vite::js('base.js') }}"></script>
    <script src="{{ Vite::js('header.js') }}"></script>
    <script>
        let sessionTimer;
        const SESSION_TIMEOUT_DURATION = "{{ config('session.lifetime') * 60000 }}";

        function redirectUserToLogin() {
            window.location.href = "{{ route('login') }}";
        }

        function startSessionTimeoutTimer() {
            clearTimeout(sessionTimer);
            sessionTimer = setTimeout(redirectUserToLogin, SESSION_TIMEOUT_DURATION);
        }
        startSessionTimeoutTimer();
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener("load", function() {
                setTimeout(function() {
                    var preloader = document.getElementById("preloader");
                    preloader.style.display = 'none'
                }, 500);

            });
        });
    </script>
    @yield('scripts')
</body>

</html>
