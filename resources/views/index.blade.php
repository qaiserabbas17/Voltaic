@extends('layouts.frontend')

@section('content')
<!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container" >
      <div class="row">
        <div class="col-lg-6  d-flex flex-column justify-content-center" >
          <span data-aos="fade-right" data-aos-offset="300" data-aos-easing="ease-in-sine">
            <h1>Lyfe makes covid-19</h1>
            <h1>easy testing easy and</h1>
            <h1>affordable for everyone</h1>
          </span>
          <br/>
          <p>On-demand experts so you can test confidently from anywhere you are in the world.</p>
          
          <div class="d-flex">
            <a href="#about" class="btn-get-started scrollto">BUY NOW</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="images/home_one.svg" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section>
  <!-- End Hero -->
 <!-- Product and Service Section -->
  <section id="product_and_service" class="faq product_and_service section-bg-green">
      <div class="container">

        <div class="section-title">
          <h2 class="">Our COVID-19 Products & Services</h2>
          <p>Test before you fly, after travelling, for work, or simply for peace of mind.</p>
        </div>
        <div class="aos-init aos-animate" data-aos="fade-up">

        <div class="row">

          @foreach($products as $key => $product)
          <div class="col-md-6 d-flex align-items-stretch aos-init aos-animate" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box">
              <img src="{{url('/assets/images/product-img/'.$product->icon)}}" alt>
              <h4>{{$product->name}}</h4>
              <p>{{$product->short_description}}</p>
              <a href="{{url('product/'.$product->slug)}}">Buy Home Test Kit Bundle</a>
              <!-- <a class="text-end" href="">Visit Test Pod</a> -->
            </div>
          </div>
          @endforeach
          <!-- <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="200">
            <div class="icon-box">
              <img src="images/pcr-icon-2.svg" alt>
              <h4>Rapid test </h4>
              <p>It is a rapid diagnostic test suitable for point-of-care testing that directly detects the presence or absence of an antigen.</p>
              <a href="#">Buy Home Test Kit Bundle</a><a class="text-end" href="">Visit Test Pod</a>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="300">
           <div class="icon-box">
              <img src="images/pcr-icon-3.svg" alt>
              <h4>PCR - Fit to Fly</h4>
              <p>In this case swab taken at home/clinic and swab sample sent to the lab to process the test.</p>
              <a href="#">Buy Home Test Kit Bundle</a><a class="text-end" href="">Visit Test Pod</a>
            </div>
          </div>
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0 aos-init aos-animate" data-aos="fade-up" data-aos-delay="400">
            <div class="icon-box">
              <img src="images/pcr-icon-4.svg" alt>
              <h4>PCR - Test to Release (day 2 & 8)</h4>
              <p>This test is mandatory for everyone who wants to end their compulsory 10-days-post-arrival quarantine. </p>
              <a href="#">Buy Home Test Kit Bundle</a><a class="text-end" href="">Visit Test Pod</a>
            </div>
          </div> -->
     
        </div>
      </div>
       
      </div>
    </section>

    <section id="with_lyfe" class="bg_themecolor">
      <div class="container">
        <div class="row">
          
          <div class="col-lg-6  mt-6">
            <h2 class="white-text">Why Test with Lyfe?</h2>
            <p class="white-text">Our mission has always been to make complex science accessible via a range of innovative DNA and blood self-collection test kits.</p>
            <p class="white-text">
              In 2020, we adapted and eolved into coronavirus testing, taking advantage of our laboratory network, scientific expertise, and digital systems to deliver world-leading SARS-CoV-2 (COVID-19) testing solutions.
            </p>
          </div>
          <div class="col-lg-6 p-3">
            <img src="images/home-3.svg" class="img-fluid float-end" alt="covidtest">
          </div>
        </div>

      </div>
    </section>
    <section id="" class="">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 p-3 ">
            <img src="images/home-4.svg" class="img-fluid" alt="covidtest">
          </div>
          <div class="col-lg-2 ">
          </div>
          <div class="col-lg-6  p-3 mt-2">
            <h2>Want to Learn More?</h2>
            <h2>Chat to Our Team.</h2>

            <p>We’ve tried to answer the most commonly asked questions below. However if you have any questions about our COVID-19 testing products and services, feel free to speak to one of our team members. We will do our best to respond as quickly as possible.</p>
            <a class="btn" href="#about">CONTACT US</a>
          </div>
          
        </div>

      </div>
    </section>
    <section id="" class="">
      <div class="container">
        <div class="row">
          <div class="col-lg-6  p-3 mt-5">
            <h2>Are You a Business?</h2>
            <p>We work with The Premier League, Soccer Aid, LSE, ECB and IBM and many more.</p>
            <a class="btn" href="#about">EXPLORE ENTERPRISE SOLUTIONS</a>
          </div>
          <div class="col-lg-1 "></div>
          <div class="col-lg-5 p-3 ">
            <img src="images/home-5.jpg" class="img-fluid" alt="home-5">
          </div>
        </div>

      </div>
    </section>

    <section id="frequently_asked_quest" class="faq section-bg">
      <div class="container">

        <div class="section-title">
          <h2 class="">Frequently Asked Questions</h2>
        </div>

        <div class="row faq-list">
          <div class="col-lg-6 mt-5 ">
            <div class="">
              <ul>
                @foreach($faqs as $key => $faq)
                @if ($key % 2 == 0)
                <li data-aos="fade-up">
                 <a data-bs-toggle="collapse" class="collapse collapsed" data-bs-target="#faq-list-{{$key}}" aria-expanded="false">{{$faq->title}} <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-{{$key}}" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      {{$faq->content}}
                    </p>
                  </div>
                </li>
                @endif
                @endforeach
                <!-- <li data-aos="fade-up" data-aos-delay="100">
                 <a data-bs-toggle="collapse" data-bs-target="#faq-list-2" class="collapsed">Where are the Lyfe testing stations? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-2" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-3" class="collapsed" aria-expanded="false">Can I use a Lyfe test before flying out of England? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-3" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300" >
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-4" class="collapsed" aria-expanded="false">How accurate are the COVID-19 tests by lyfe? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-4" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="400">
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-5" class="collapsed" aria-expanded="false">How do you handle personal data? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-5" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="400">
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-6" class="collapsed" aria-expanded="false">I don't need to test anymore, can I get a refund? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-6" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                    </p>
                  </div>
                </li> -->
              </ul>
            </div>
          </div>
          <div class="col-lg-6 mt-5 ">
            <div class="">
              <ul>
                @foreach($faqs as $key => $faq)
                @if ($key % 2 != 0)
                <li data-aos="fade-up">
                 <a data-bs-toggle="collapse" class="collapse collapsed" data-bs-target="#faq-list-{{$key}}" aria-expanded="false">{{$faq->title}} <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-{{$key}}" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      {{$faq->content}}
                    </p>
                  </div>
                </li>
                @endif
                @endforeach

                <!-- <li data-aos="fade-up" data-aos-delay="100">
                 <a data-bs-toggle="collapse" data-bs-target="#faq-list-8" class="collapsed">Can I use a Lyfe test when I arrive in England from abroad? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-8" class="collapse" data-bs-parent=".faq-list">
                    <p>
                      Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="200">
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-9" class="collapsed" aria-expanded="false">I'm not travelling, can I still order a Lyfe COVID-19 test? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-9" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="300" >
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-10" class="collapsed" aria-expanded="false">How long do the results take? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-10" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in.
                    </p>
                  </div>
                </li>

                <li data-aos="fade-up" data-aos-delay="400">
                  <a data-bs-toggle="collapse" data-bs-target="#faq-list-11" class="collapsed" aria-expanded="false">I have children (<18 years of age). Are they eligible? <i class="bx bx-plus icon-show"></i><i class="bx bx-minus icon-close"></i></a>
                  <div id="faq-list-11" class="collapse" data-bs-parent=".faq-list" style="">
                    <p>
                      Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque.
                    </p>
                  </div>
                </li> -->

                
              </ul>
            </div>
          </div>

        </div>
      </div>
    </section>

@endsection
