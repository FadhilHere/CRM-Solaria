<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('assetsLanding/img/Solaria.png') }}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/line-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/swiper.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assetsLanding/css/style.css') }}">
    @yield('css')
</head>

<body>
    <!-- navbar -->
    @include('pelanggan.layouts.partials.navbar')
    <!-- end navbar -->

    @yield('main')

    <!-- footer -->
    @include('pelanggan.layouts.partials.footer')
    <!-- end footer -->

    @yield('modal')

    <!-- scripts -->
    <script src="{{ asset('assetsLanding/js/jquery.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/jquery.filterizr.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assetsLanding/js/main.js') }}"></script>
    @yield('js')
    @yield('script')
</body>

</html>
