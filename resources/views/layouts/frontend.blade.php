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
  <link href="{{ asset('/frontassets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontassets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontassets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontassets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <!-- Template Main CSS File -->
  <link href="{{ asset('/frontassets/css/style.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontassets/css/cart.css') }}" rel="stylesheet">
  <link href="{{ asset('/frontassets/css/aos.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://use.typekit.net/kcv2icd.css">

</head>
    <body>
      <!-- ======= Action Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center ">
      <div class="contact-info d-flex align-items-center">
        <p class="text-center">Opening Hours: Monday to Friday - 8am to 9pm</p>
      </div>
      
    </div>
  </section>
    <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="{{url('/')}}" class="logo"><img src="{{url('images/logo.svg')}}" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="{{url('/')}}">Home</a></li>
          <li class="dropdown" ><a class="nav-link scrollto" href="#about"><span>Lyfe Test</span> <i class="bi bi-chevron-down"></i></a>
           <ul>
              @foreach (\app('products') as $product)
                <li><a href="{{url('product/'.$product->slug)}}">{{$product->name}}</a></li>
              @endforeach
              
			        {{-- <li><a href="https://webdevholdsite.co.uk/lyfe/test-to-release.php">Test to Release</a></li>
              <li><a href="https://webdevholdsite.co.uk/lyfe/fit-to-fly.php">Fit to Fly</a></li>
              <li><a href="https://webdevholdsite.co.uk/lyfe/pcr.php">PCR</a></li> --}}
              {{-- <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li> --}}
              
            </ul>
          </li>
          <li class="dropdown" ><a class="nav-link scrollto" href="#about"><span>Learn</span> <i class="bi bi-chevron-down"></i></a>
            <ul class="dropdown-menu megamenu-content" role="menu" style="left:-800px;width: 1220px">
              <li>
              <div class="row">
                  <div class="col-sm-4">
                
                      
                  </div><!-- end col-4 -->
                  <div class="col-sm-4">
                    
                  </div><!-- end col-4 -->
                  <div class="col-sm-4">
                  </div><!-- end col-4 -->
              </div><!-- end row -->
              </li>
            </ul>
          </li>
          
          <li><a class="nav-link scrollto" href="#portfolio">Blog</a></li>
          
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>

          @guest
          <li><a class="getstarted scrollto" href="{{ url('/login') }}">Login</a></li>
          @else
          <li class="dropdown" ><a class="nav-link scrollto" href="#about"><span>{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              {{-- <li><a href="javascript:;">Dashboard</a></li>
              <li><a href="javascript:;">My Account</a></li> --}}
              <li><a href="{{ route('logout') }}" 
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                  @csrf
                </form>
              </li>
            </ul>
          </li>
          @endguest

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>

  @yield('content')

  <!-- ======= Footer ======= -->
  @if (!isset($footer))
    
  
    <footer id="footer">

        <div class="footer-top">
          <div class="container">
            <div class="row">

              <div class="col-lg-3 col-md-6 footer-contact">
                  <a href="{{url('/')}}" class="logo"><img src="{{url('images/foterlogo.svg')}}" alt="" class="img-fluid"></a>
                <br/><br/>
                <p>
                  lyfe is a world leader in COVID-19 testing. Each day we help Britain get a step closer to normal, everyday life. 
                </p>
                <div class="social-links text-md-right pt-3 ">
                  <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
                  <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
                  <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>COVID-19 Test & Services</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Travel Testing Package Day 2 Day 8</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Test to Release home test kit</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Test to Release on-site test</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Fit to Fly home test kit</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Health Check home test kit</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Health Check on-site test</a></li>
                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
                <h4>Information</h4>
                <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Science</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Media</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">The Team</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Blog</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">FAQs</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Contact Us</a></li>

                </ul>
              </div>

              <div class="col-lg-3 col-md-6 footer-links">
               <h4>Enterprise</h4>
               <ul>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">What We Do</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Customers</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">RT-PCR Test</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Point of Care Test</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Antibody Test</a></li>
                  <li><i class="bx bx-chevron-right"></i> <a href="#">Health Passport</a></li>
                </ul>
              </div>

            </div>
          </div>
        </div>

        <div class="container  py-4 copyright-section">
          <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="copyright">
                  Company Registration Number: 00000000
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-center">© 2021 LYFE All rights reserved</div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="text-end"><a href="#"> Privacy Policy | Terms and Condition</a></div>
            </div>
          </div>
        </div>
    </footer>
    @endif
    <!--
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  -->
    <!-- Vendor JS Files -->
    <script src="{{ asset('/frontassets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/frontassets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('/frontassets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('/frontassets/vendor/php-email-form/validate.js') }}"></script>
     <!-- <script src="assets/vendor/purecounter/purecounter.js"></script>  -->
    <script src="{{ asset('/frontassets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('/frontassets/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    @yield('script')
  </body>
</html>