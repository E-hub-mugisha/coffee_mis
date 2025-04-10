<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from uiparadox.co.uk/templates/sip-savor/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Apr 2025 05:29:30 GMT -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Coffee Shop">

    <title>Sip Savor</title>

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('front-pages/assets/media/favicon.png') }}">


    <!-- All CSS files -->
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/vendor/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/vendor/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/vendor/slick-slider.css') }}">
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/vendor/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('front-pages/assets/css/app.css') }}">

</head>

<body class="tt-smooth-scroll">

    <!-- Main Wrapper Start -->
    <div id="scroll-container">
        <!-- Header Start -->
        @include('includes.header')
        <!-- Header End -->

        @yield('content')

        <!-- Footer Start -->
        @include('includes.footer')
    </div>
    <!-- Main Wrapper End -->

    <!-- Back To Top Start -->
    <button class="scrollToTopBtn" aria-label="Back to top"><i class="fa fa-arrow-up"></i></button>

    <!-- Mobile Menu Start -->
    <div class="mobile-nav__wrapper">
        <div class="mobile-nav__overlay mobile-nav__toggler"></div>
        <div class="mobile-nav__content">
            <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>
            <div class="logo-box">
                <a href="index.html" aria-label="logo image"><img src="assets/media/mobile-logo.png" alt=""></a>
            </div>
            <div class="mobile-nav__container"></div>
            <ul class="mobile-nav__contact list-unstyled">
                <li>
                    <i class="fas fa-envelope"></i>
                    <a href="mailto:example@company.com">example@company.com</a>
                </li>
                <li>
                    <i class="fa fa-phone-alt"></i>
                    <a href="tel:+12345678">+123 (4567) -890</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Mobile Menu End -->

    <!-- modal-popup area end  -->
    <div class="search-popup">
        <div class="search-popup__overlay search-toggler"></div>
        <div class="search-popup__content">
            <form role="search" method="get" class="search-popup__form" action="https://uiparadox.co.uk/templates/sip-savor/index.html">
                <input type="text" id="search" placeholder="Search Here...">
                <button type="submit"><i class="fal fa-search"></i></button>
            </form>
        </div>
    </div>
    <!-- search-popup -->


    <!-- Jquery Js -->
    <script src="{{ asset('front-pages/assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('front-pages/assets/js/vendor/jquery-3.6.3.min.js') }}"></script>
    <script src="{{ asset('front-pages/assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('front-pages/assets/js/vendor/swiper.js') }}"></script>

    <script src="{{ asset('front-pages/assets/js/app.js') }}"></script>


</body>


<!-- Mirrored from uiparadox.co.uk/templates/sip-savor/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 09 Apr 2025 05:29:49 GMT -->

</html>