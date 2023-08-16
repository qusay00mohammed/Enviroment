<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="site_name" property="og:site_name" content="Palestine Association for Education &amp; Environmental Protection  ، PAEEP">
    <meta name="author" content="َQusayAlkahlout, qmkahlout@gmail.com">
    <meta name="robots" content="index, follow">
    <meta name="url" property="og:url" content="{{ URL::current() }}">
    <meta property="og:url" content="{{ URL::current() }}" />



    <link rel="canonical" href="https://enviroment.sparkerx.com/">

    <link rel="shortcut icon" href="{{ asset('assets/favicon.ico') }}" type="image/x-icon">
    @yield('meta')
    <title>@yield('title', 'Home')</title>

    @if(App::getLocale() == 'en')
        <link rel="stylesheet" href="{{ asset('website/css/en/style.ltr.css') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400&display=swap" rel="stylesheet">
    @elseif (App::getLocale() == 'ar')
        <link rel="stylesheet" href="{{ asset('website/css/style.css') }}">
    @endif

    <link rel="stylesheet" href="{{ asset('website/css/swiper.css') }}" />
    <link rel="stylesheet" href="{{ asset('website/css/bootstrap.min.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('website/css/animate.css') }}">

    {{-- Toastr Notifications CSS --}}
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet">

    @if (App::getLocale() == "en")
    @include('layouts.alert_en')
    @elseif (App::getLocale() == "ar")
    @include('layouts.alert')
    @endif

    @yield('css')
</head>

<body>

@include('layouts.website.header')




@yield('content')





@include('layouts.website.footer')

    <a href="#" class="scrollup" id="scroll-up">
        <i class='bx bxs-chevron-up-circle'></i>
    </a>
    {{-- Axios --}}
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="{{ asset('website/js/jquery library.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="{{ asset('website/js/vanila_tilt.js') }}"></script>
    <script src="{{ asset('website/js/swiper.js') }}"></script>
    {{-- <script src="{{ asset('website/js/bootstrap.min.js') }}"></script> --}}
    <script src="{{ asset('website/js/scrollreveal.min.js') }}"></script>
    <script src="{{ asset('website/js/main.js') }}"></script>


    {{-- Toastr Notifications JS --}}
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>

    @yield('js')
</body>

</html>
