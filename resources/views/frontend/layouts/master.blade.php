<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densityDpi=device-dpi" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <title>Sazao || e-Commerce HTML Template</title>
    <link rel="icon" type="image/png" href="{{ asset('front/images/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('front/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.nice-number.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.calendar.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/add_row_custon.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/mobile_menu.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.exzoom.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/multiple-image-video.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/ranger_style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/jquery.classycountdown.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/venobox.min.css') }}">

    <link rel="stylesheet" href="{{ asset('front/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/responsive.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('front/css/rtl.css') }}"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    @stack('css')

</head>

<body>

    <!--============================
        HEADER START
    ==============================-->
    @include('frontend.layouts.header')
    <!--============================
        HEADER END
    ==============================-->


    <!--============================
        MAIN MENU START
    ==============================-->
    @include('frontend.layouts.menu')
    <!--============================
        MAIN MENU END
    ==============================-->


    <!--==========================
        POP UP START
    ===========================-->
    <!-- <section id="wsus__pop_up">
        <div class="wsus__pop_up_center">
            <div class="wsus__pop_up_text">
                <span id="cross"><i class="fas fa-times"></i></span>
                <h5>get up to <span>75% off</span></h5>
                <h2>Sign up to E-SHOP</h2>
                <p>Subscribe to the <b>E-SHOP</b> market newsletter to receive updates on special offers.</p>
                <form>
                    <input type="email" placeholder="Your Email" class="news_input">
                    <button type="submit" class="common_btn">go</button>
                    <div class="wsus__pop_up_check_box">
                    </div>
                </form>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault11">
                    <label class="form-check-label" for="flexCheckDefault11">
                        Don't show this popup again
                    </label>
                </div>
            </div>
        </div>
    </section> -->
    <!--==========================
        POP UP END
    ===========================-->

    <!--==========================
        MAIN CONTENT START
    ===========================-->
    @yield('content')
    <!--==========================
        MAIN CONTENT END
    ===========================-->


    <!--============================
        FOOTER PART START
    ==============================-->
    @include('frontend.layouts.footer')
    <!--============================
        FOOTER PART END
    ==============================-->


    <!--============================
        SCROLL BUTTON START
    ==============================-->
    <div class="wsus__scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--============================
        SCROLL BUTTON  END
    ==============================-->


    <!--jquery library js-->
    <script src="{{ asset('front/js/jquery-3.6.0.min.js') }}"></script>
    <!--bootstrap js-->
    <script src="{{ asset('front/js/bootstrap.bundle.min.js') }}"></script>
    <!--font-awesome js-->
    <script src="{{ asset('front/js/Font-Awesome.js') }}"></script>
    <!--select2 js-->
    <script src="{{ asset('front/js/select2.min.js') }}"></script>
    <!--slick slider js-->
    <script src="{{ asset('front/js/slick.min.js') }}"></script>
    <!--simplyCountdown js-->
    <script src="{{ asset('front/js/simplyCountdown.js') }}"></script>
    <!--product zoomer js-->
    <script src="{{ asset('front/js/jquery.exzoom.js') }}"></script>
    <!--nice-number js-->
    <script src="{{ asset('front/js/jquery.nice-number.min.js') }}"></script>
    <!--counter js-->
    <script src="{{ asset('front/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('front/js/jquery.countup.min.js') }}"></script>
    <!--add row js-->
    <script src="{{ asset('front/js/add_row_custon.js') }}"></script>
    <!--multiple-image-video js-->
    <script src="{{ asset('front/js/multiple-image-video.js') }}"></script>
    <!--sticky sidebar js-->
    <script src="{{ asset('front/js/sticky_sidebar.js') }}"></script>
    <!--price ranger js-->
    <script src="{{ asset('front/js/ranger_jquery-ui.min.js') }}"></script>
    <script src="{{ asset('front/js/ranger_slider.js') }}"></script>
    <!--isotope js-->
    <script src="{{ asset('front/js/isotope.pkgd.min.js') }}"></script>
    <!--venobox js-->
    <script src="{{ asset('front/js/venobox.min.js') }}"></script>
    <!--classycountdown js-->
    <script src="{{ asset('front/js/jquery.classycountdown.js') }}"></script>

    <!--main/custom js-->
    <script src="{{ asset('front/js/main.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    @stack('js')
    <script>
      @if ($errors->any())
        @foreach ($errors->all() as $error)
          // toastr.error("{{ $error }}")
          @php
            toastr()->error($error)
          @endphp
        @endforeach
      @endif
    </script>
</body>

</html>