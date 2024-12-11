<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ Vite::css('app.css') }}">
</head>

<body class="font-Poppins bg-secondary">
    <!-- main section start -->
    <div class="px-4">
        <div class="row">
            <div class="w-full px-4">
                <div class="w-full h-screen flex items-center justify-center p-6">
                    <div class="content">
                        @yield('content')
                        <div class="flex justify-center">
                            <a href="{{ route('login') }}"
                                class="bg-primary rounded-sm hover:bg-opacity-90 text-white font-16 font-semibold px-4 2xl:px-6 py-2 2xl:py-2.5 duration-300 capitalize">
                                {{ __('Back') }}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main section end -->
</body>

</html>
