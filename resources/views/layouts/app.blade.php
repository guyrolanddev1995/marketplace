<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('settings.site_title') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

      <!--=====================================
                    CSS LINK PART START
        =======================================-->
        <!-- FOR FAVICON -->
        <link rel="icon" href="{{ asset('storage/'.config('settings.site_favicon')) }}">

        <!-- FOR FLATICON -->
        <link rel="stylesheet" href="{{ asset('frontend/css/vendor/flaticon.css') }}">

        <!-- FOR FONT AWESOME -->
        <link rel="stylesheet" href="{{ asset('frontend/css/vendor/fontawesome.css') }}">

        <!-- FOR SLICK SLIDER -->
        <link rel="stylesheet" href="{{ asset('frontend/css/vendor/slick.css') }}">

        <!-- FOR BOOTSTRAP -->
        <link rel="stylesheet" href="{{ asset('frontend/css/vendor/bootstrap.min.css') }}">

        <!-- FOR COMMON STYLE -->
        <link rel="stylesheet" href="{{ asset('frontend/css/custom/main.css') }}">

        <!-- FOR HOME-1 PAGE -->
        <link rel="stylesheet" href="{{ asset('frontend/css/custom/index.css') }}">

        <link rel="stylesheet" href="{{ asset('frontend/css/custom/product-list-3.css') }}">

         
        <livewire:styles />

        @yield('styles')
        <!--=====================================
                    CSS LINK PART END
        =======================================-->


</head>
<body>

    @include('frontend.partials.flash')
    @include('frontend.partials.header')
    @include('frontend.partials.navbar')
    @include('frontend.partials.mobil_menu')

    @yield('content')
    
    @include('frontend.partials.footer')

    <!--=====================================
                JS LINK PART START
    =======================================-->
    <!-- FOR BOOTSTRAP -->
    <script src="{{ asset('frontend/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/vendor/bootstrap.min.js') }}"></script>

    <!-- FOR SLICK SLIDER -->
    <script src="{{ asset('frontend/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom/slick.js') }}"></script>

    <!-- FOR COMMON SCRIPT -->
    <script src="{{ asset('frontend/js/custom/main.js') }}"></script> 
    <!--=====================================
                JS LINK PART END
    =======================================-->
    <livewire:scripts />

    <script src="{{ asset("js/app.js")}}"></script>

    @yield('scripts')
</body>
</html>
