@extends('layouts.guest-master')

@section('content')
<style>
    .alert.alert-successs.alert-dismissible.fade.show {
    margin: auto;
    width: 85%;
    background: #ccffc3;
    padding: 10px;
    }
</style>
  <div class="container-fluid login-board">
    <div class="border-0">
        <div class="row d-flex" style="height: calc(100vh - 0px);">
            <div class="col-lg-6 loginbg">
                <div class="">
                    <div class="row"> 
                        <a href="{{ url('/') }}"><img src="assets/images/voltaoc.png" class="login-logo"> </a>
                    </div>
                    <div class="justify-content-center">
                     <img src="images/login-img.svg" class="login-image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-area">
                    <span class="form-inner-area">
                    <h2 class="text-center mt-5 fw-bold">Log In</h2>
                        @if (session('success'))
                            <div class="alert alert-successs alert-dismissible fade show mt-4 mb-3">{{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="border-0 px-5">
                                <div class="">
                                    <label for="email" class="mb-1">Enter Email</label> 
                                    <input class="mb-1 @error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="yourname@example.com" autofocus> 

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class=""> 
                                    <label for="password" class="mb-1">Password</label> 
                                    <input id="password" class="@error('password') is-invalid @enderror" type="password" name="password" required autocomplete="current-password" placeholder="Please enter password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror    
                                </div>
                                <div class="mb-4 mt-2">
                                    <a href="{{ route('password.request') }}" class=" text-end">Forgot Password?</a>
                                </div>
                                <div class="mb-3"> 
                                    <button type="submit" class="btn-blue text-center">Login In</button> 
                                </div>
                                <!--<div class=" mb-4 px-3 text-center"> -->
                                <!--    <span class="font-weight-bold">New? -->
                                <!--        <a href="{{ url('/register') }}">Create an account</a>-->
                                <!--    </span> -->
                                <!--</div>-->
                            </div>

                        </form>
                        <div class="py-3 text-center">
                            <p >Any question?</p>
                            <span class="font-weight-bold">Please contact us at? 
                                <a href="mailto:contact@voltaicpower.net">contact@voltaicpower.net</a>
                            </span> 
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection