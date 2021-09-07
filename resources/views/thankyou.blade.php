@extends('layouts.frontend')
@section('content')
<!-- ======= Hero Section ======= -->
<section class="d-flex align-items-center section-bg">

  <div class="container" >
    <div class="row">
      <div class="col-md-10 offset-md-1 bg-white mt-5 pb-5">
        <img style="display:block;margin:0 auto" src="{{ asset('images/thankyou.svg') }}" class="mt-5 text-center">
        <br/>
        <p class="text-center">Hi {{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
        <p class="text-center">We  got your order! we will let you know when its shipped and
        headed your way</p>
        <a href="#about" class="dash-btn-blue scrollto mt-4 text-center">VIEW ORDER</a>
      </div>
    </div>
  </div>

</section>
<!-- End Hero -->
@endsection
