<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Saoura Aquarat</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{asset('/sites/original/img/favicon.ico')}}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('/sites/original/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('/sites/original/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">    

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('/sites/original/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('admins')}}/css/bootstrap-rtl.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('/sites/original/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('/sites/original/css/mystyle.css')}}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        @yield('spinner')
        <!-- Spinner End -->


        <!-- Navbar Start -->
        @yield('navbar')
        <!-- Navbar End -->


        <!-- Header Start -->
        @yield('header')
        <!-- Header End -->


        <!-- Search Start -->
        @yield('search')
        <!-- Search End -->


        <!-- Category Start -->
        @yield('category')
        <!-- Category End -->


        <!-- About Start -->
        @yield('about')
        <!-- About End -->


        <!-- Property List Start -->
        @yield('property_list')
        <!-- Property List End -->


        <!-- Call to Action Start -->
        @yield('call_to_action')
        <!-- Call to Action End -->


        <!-- Team Start -->
        @yield('team')
        <!-- Team End -->


        <!-- Testimonial Start -->
        @yield('testmonial')
        <!-- Testimonial End -->
        

        <!-- Footer Start -->
        @yield('footer')
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('/sites/original/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('/sites/original/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('/sites/original/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('/sites/original/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('/sites/original/js/main.js')}}"></script>
</body>

</html>