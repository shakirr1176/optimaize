<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" href="{{ Vite::css('app.css') }}">
    <link rel="stylesheet" href="{{ Vite::css('base.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ get_favicon_url() }}">
    @if (settings('display_google_captcha'))
        {!! NoCaptcha::renderJs() !!}
    @endif
</head>

<body class="font-Poppins bg-optm-gray-200">
    <!-- main section start -->
    <div class="w-full min-h-screen flex items-center justify-center p-4 md: py-10">
        {{ $slot }}
    </div>
    <!-- main section end -->
</body>
<script>
    let alertBoxButtons = document.querySelectorAll('.alert-close-btn');
    let alertBoxs = document.querySelectorAll('.alert-box');
    alertBoxs?.forEach(function(el) {
        el.style.height = el.clientHeight + 'px';
        setTimeout(function() {
            el.style.height = '0px';
            setTimeout(function() {
                el.remove();
            }, 500);
        }, 5000);
    });

    alertBoxButtons?.forEach(function(el) {
        el.addEventListener('click', function(e) {
            requestAnimationFrame(() => {
                e.target.closest('.alert-box').style.height = e.target.closest('.alert-box')
                    .clientHeight + 'px';
                requestAnimationFrame(() => {
                    e.target.closest('.alert-box').style.height = '0px';
                });
            });
            setTimeout(function() {
                e.target.closest('.alert-box').remove();
            }, 500);
        });
    });
    window.addEventListener('click', function(e) {
        let eyeIcon = e.target.closest('.passwordFields .eye');
        if (eyeIcon) {
            let parent = eyeIcon.closest('.passwordFields');
            let input = parent.querySelector('input');
            showPassword(parent, input, eyeIcon);
        }
    });


    function showPassword(parent,inpt,btn){
        inpt.type = inpt.type === 'password' ? 'text' : 'password';
        parent.classList.toggle('active')
    }
</script>
@yield('scripts')

</html>
