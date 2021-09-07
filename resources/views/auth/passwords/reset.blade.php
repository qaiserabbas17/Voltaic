@extends('layouts.guest-master')

@section('content')  
  <div class="container-fluid login-board">
    <div class="border-0">
        <div class="row d-flex" style="height: calc(100vh - 0px);">
            <div class="col-lg-6 loginbg">
                <div class="">
                    <div class="row"> 
                        <img src="{{ asset('images/logo.svg') }}" class="login-logo"> 
                    </div>
                    <div class="justify-content-center">
                     <img src="{{ asset('images/login-img.svg') }}" class="login-image"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-area">
                    <span class="form-inner-area">
                      <h2 class="text-center mt-5 fw-bold">Create new password</h2>
                      <p class="text-center"></p>
                        <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row" style="display: none;">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>

                            <div class="border-0 px-5">
                                <div class="mb-4">
                                    <label class="mb-1">Create New Password</label> 
                                    <input class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Enter new password" required autocomplete="new-password"> 

                                    @error('password')
                                    <span class="mb-4 invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                          <div class="">
                            <label class="mb-1">Confirm New Password</label> 
                            <input class="mb-4 " type="password" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm new password"> 
                          </div>
                                <div class="mb-3"> 
                                    <button type="submit" class="btn-blue text-center">Change Password</button> 
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