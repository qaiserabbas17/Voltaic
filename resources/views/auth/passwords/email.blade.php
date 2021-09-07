@extends('layouts.guest-master')
<style>
    .alert.alert-success {
    width: 85%;
    margin: auto;
    }
</style>
@section('content')
  <div class="container-fluid login-board">
    <div class="border-0">
        <div class="row d-flex" style="height: calc(100vh - 0px);">
            <div class="col-lg-6 loginbg">
                <div class="">
                    <div class="row"> 
                        <a href="https://webdevholdsite.co.uk/lyfe"><img src="{{ asset('images/logo.svg') }}" class="login-logo"> </a>
                    </div>
                    <div class="justify-content-center">
                     <img src="{{ asset('images/login-img.svg') }}" class="login-image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-area">
                    <span class="form-inner-area">
                      <h2 class="text-center mt-5 fw-bold">Forget password</h2>
                      <p class="text-center mb-5">To reset password, please verify your email address</p>
                        @if (session('status'))
                        <div class="alert alert-success mb-1" role="alert">
                            {{ session('status') }}
                        </div>
                        @endif

                        <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                            <div class="border-0 px-5">
                                <div class="">
                                    <label class="mb-1">Enter Email</label> 
                                    <input class="@error('email') is-invalid @enderror" id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> 

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3 mt-4"> 
                                    <button type="submit" class="btn-blue text-center">Confirm Email</button> 
                                </div>
                                <div class=" mb-4 px-3 text-center"> 
                                    <span class="font-weight-bold">Remember password? 
                                        <a href="{{ url('/login') }}">login</a>
                                    </span> 
                                </div>
                            </div>
                        </form>

                        <div class="py-3 text-center">
                            <p >Any question?</p>
                            <span class="font-weight-bold">Please contact us at? 
                                <a href="mailto:care@lyfe.co.uk">Care@lyfe.co.uk</a>
                            </span> 
                        </div>
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection