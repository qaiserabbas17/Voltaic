<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Lyfe</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

<!-- Favicons 
<link href="assets/img/favicon.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
-->
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('frontassets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontassets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('frontassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('frontassets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<!-- Template Main CSS File -->
<link href="{{ asset('frontassets/css/style.css') }}" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/css/intlTelInput.css" rel="stylesheet" media="screen">
<link href="{{ asset('frontassets/css/aos.css') }}" rel="stylesheet">
</head>

<body>
	@yield('content')

<!-- Vendor JS Files -->
        <!--Jquery js -->
        <script src="{{ asset('/assets/js/jquery.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/11.0.9/js/intlTelInput.min.js"></script>
        
        <script src="{{ asset('frontassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('frontassets/vendor/glightbox/js/glightbox.min.js') }}"></script>
        <script src="{{ asset('frontassets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
        <script src="{{ asset('frontassets/vendor/php-email-form/validate.js') }}"></script>
        {{-- <script src="{{ asset('frontassets/vendor/purecounter/purecounter.js') }}"></script>  --}}
        <script src="{{ asset('frontassets/vendor/swiper/swiper-bundle.min.js') }}"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('frontassets/js/main.js') }}"></script>
        <script src="{{ asset('frontassets/js/tel-input.js') }}"></script>
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        @yield('script')
    </body>
</html>