<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ========== Page Title ========== -->
    <title>Synck - New IT Services and Business Consulting HTML5 Template</title>

    <!-- ========== Start Fonts Style ========== -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100;0,9..40,200;0,9..40,300;0,9..40,400;0,9..40,500;0,9..40,600;0,9..40,700;0,9..40,800;1,9..40,100;1,9..40,200;1,9..40,300;1,9..40,400;1,9..40,500;1,9..40,600&amp;family=Syne:wght@400;500;600&amp;family=Yantramanav:wght@100;300;400;500;700;900&amp;display=swap"
        rel="stylesheet">

    <!-- ========== Start Stylesheet ========== -->
    <link rel="stylesheet"
        href="cdn.jsdelivr.net/gh/iconoir-icons/iconoir%40main/css/iconoir.css">
    <link rel="stylesheet"
        href="../../../maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://eclectic-narwhal-7eb4c2.netlify.app/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../../cdn.jsdelivr.net/npm/swiper%4010/swiper-bundle.min.css"/>

    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/responsive.css') }}">

    <!-- ========== End Stylesheet ========== -->

</head>

<body>

    <!-- Main -->
    <main class="main-page homepage2">

        @include('frontend.header')
        @include('frontend.hero')
        {{-- @include('frontend.client') --}}
        {{-- @include('frontend.service') --}}
        @include('frontend.how')
        @include('frontend.about')
        {{-- @include('frontend.news') --}}
        {{-- @include('frontend.testimonial') --}}
        {{-- @include('frontend.contact') --}}
    </main>
    <!-- jQuery Frameworks
    ============================================= -->
    <script src="{{ URL::asset('assets/js/jquery-3.7.0.min.js') }}"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/gsap.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/Draggable.min.js') }}"></script>
    <script src="{{ URL::asset('assets/js/swiper-bundle.min.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/client-marquee.js') }}"></script>
    <script src="{{ URL::asset('assets/js/slideTobook.js') }}"></script>
    <script src="{{ URL::asset('assets/js/theme-custom.js') }}"></script>
    <script src="{{ URL::asset('assets/js/form2.js') }}"></script>
    <script src="{{ URL::asset('assets/js/subscribe-form.js') }}"></script>
    <script src="{{ URL::asset('assets/js/theme-worldmap.js') }}"></script>
    
</body>


<!-- Mirrored from wpriverthemes.com/HTML/synck/home2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 16 Jan 2025 00:28:01 GMT -->
</html>