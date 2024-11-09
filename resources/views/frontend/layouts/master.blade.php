<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <title>FoodPark || Restaurant Template</title>
    <link rel="stylesheet" href="{{ asset('frontend/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/spacing.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/responsive.css') }}">

    <!-- <link rel="stylesheet" href="css/rtl.css"> -->
</head>

<body>


    <!--=============================
       Top Bar and  MENU START
    ==============================-->

    @include('frontend.layouts.menu');


    <!--=============================
        MENU END
    ==============================-->


@yield('content')


    <!--=============================
        FOOTER START
    ==============================-->
 @include('frontend.layouts.footer')
    <!--=============================
        FOOTER END
    ==============================-->


    <!--=============================
        SCROLL BUTTON START
    ==============================-->
    <div class="fp__scroll_btn">
        go to top
    </div>
    <!--=============================
        SCROLL BUTTON END
    ==============================-->


    <!-- jQuery library js -->
<script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap js -->
<script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
<!-- Font Awesome js -->
<script src="{{ asset('frontend/js/Font-Awesome.js') }}"></script>
<!-- Slick slider -->
<script src="{{ asset('frontend/js/slick.min.js') }}"></script>
<!-- Isotope js -->
<script src="{{ asset('frontend/js/isotope.pkgd.min.js') }}"></script>
<!-- SimplyCountdown js -->
<script src="{{ asset('frontend/js/simplyCountdown.js') }}"></script>
<!-- Counter Up js -->
<script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery.countup.min.js') }}"></script>
<!-- Nice Select js -->
<script src="{{ asset('frontend/js/jquery.nice-select.min.js') }}"></script>
<!-- Venobox js -->
<script src="{{ asset('frontend/js/venobox.min.js') }}"></script>
<!-- Sticky Sidebar js -->
<script src="{{ asset('frontend/js/sticky_sidebar.js') }}"></script>
<!-- WOW js -->
<script src="{{ asset('frontend/js/wow.min.js') }}"></script>
<!-- Ex Zoom js -->
<script src="{{ asset('frontend/js/jquery.exzoom.js') }}"></script>
<!-- Main/Custom js -->
<script src="{{ asset('frontend/js/main.js') }}"></script>


</body>

</html>
