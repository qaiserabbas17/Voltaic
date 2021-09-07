@extends('layouts.guest-master')
<style>
    button[disabled]{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
}
button[disabled]:hover{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
}
#error-msg {
    display: none;
    color: #ff2851;
    font-size: 14px;
    margin-top: 10px;
}
.intl-tel-input .hides {
  display: none;
}
.intl-tel-input .v-hides {
  visibility: hidden;
}
.intl-tel-input.separate-dial-code .selected-flag {
     background-color: transparent !important;
}
.hides {
  display: none;
}
.intl-tel-input.allow-dropdown.separate-dial-code {
    width: -webkit-fill-available;
}
.intl-tel-input.separate-dial-code .selected-flag {
    margin-left: 12px;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-4 input[type=tel] {
    padding-left: 105px !important;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-3 input[type=tel] {
    padding-left: 90px !important;
}
.intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input, .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=text], .intl-tel-input.separate-dial-code.allow-dropdown.iti-sdc-5 input[type=tel] {
    padding-left: 105px !important;
}
span#error-msgs {
    color: #ff2828;
}
span#valid-msg {
    color: #1bc91b;
}
span#verification_not_match {
    color: #ff2828;
}
span#verification_match {
    color: #1bc91b;
}
</style>
@section('content')
<div class="container-fluid login-board">
    <div class="border-0">
        <div class="row d-flex" style="height: calc(100vh - 0px);">
            <div class="col-lg-6 loginbg">
                <div class="">
                    <div class="row"> 
                        <a href="{{ url('/') }}"><img src="{{ asset('images/logo.svg') }}" class="login-logo"></a>
                    </div>
                    <div class="justify-content-center">
                        <img src="{{ asset('images/login-img.svg') }}" class="login-image"> </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-area">
                        <form class="row g-3 px-5" method="POST" action="{{ route('register') }}" id="registerform">
                            @csrf
                            <h2 class="text-center mt-5">Create Your Account</h2>
                            <p class="text-center">To order a COVID-19 Test, please create a Lyfe account.
                            Your account will be used to order, activate and view your COVID-19 test results.</p>
                            <div id="msg" class="alert alert-success mb-0" style="display:none"></div>
                            <div class="col-md-8">
                                <label for="inputEmail4" class="form-label">Enter Email</label>
                                <input type="email" {{-- id="txtPassportNumber" --}} class="@error('email') is-invalid @enderror" name="email" autofocus value="" id='email-id' placeholder="yourname@example.com" oninput="checker()" required>

                                <div id="icon"></div>
                                <p class="mt-0" id='error-msg'>Please Enter A Valid Email Address</p>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputPassword4" class="form-label invisible">SEND CODE</label>
                                <button type="button" id="emailButton" class="btn-blue text-center" disabled="disabled">SEND CODE</button>
                            </div>
                            <div class="col-md-12">
                                <label for="inputPassword4" class="form-label">Enter code</label>
                                <input minlength="4" maxlength="4" type="code" value="" name="verification_no" id="inputPassword4" placeholder="Please enter 4-Digit verification code" disabled>

                                <span id="verification_match" class="hides">Verification code match</span>
                                <span id="verification_not_match" class="hides">Please enter currect code.</span>
                            </div>

                            <div class="col-md-6 col-6">
                                <label for="firstname" class="form-label">First Name</label>
                                <input class="@error('firstname') is-invalid @enderror" type="text" name="firstname" id="firstname" value="{{ old('firstname') }}" required autocomplete="name" placeholder="First Name">
                                @error('firstname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col-md-6 col-6">
                                <label for="lastname" class="form-label">Last Name</label>
                                <input id="lastname" class="@error('lastname') is-invalid @enderror" type="text" name="lastname" value="{{ old('lastname') }}" placeholder="Last Name" required>
                                @error('lastname')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <input type="hidden" name="role_id" value="9">

                            <div class="col-md-6 col-6">
                                <label for="password" class="form-label">Password</label>
                                <input class="@error('password') is-invalid @enderror" type="password"  id="password" name="password" required autocomplete="new-password" placeholder="Password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-6">
                                <label for="password-confirm" class="form-label" style="visibility:hidden;">CPass</label>
                                <input type="password" name="password_confirmation" placeholder="Confirm Password" id="password-confirm" required autocomplete="new-password">
                            </div>
                            {{-- <div class="col-md-4 col-5">
                                <label for="phonecode" class="form-label">Enter Mobile</label> --}}
                                <input type="hidden" name="phone[0]" value="" id="phonecode">
                                {{-- <input class="phone" name="phone[0]" value="">
                                <span id="valid-msg" class="hides">Valid</span>
                                <span id="error-msgs" class="hides">Invalid number</span>
                            </div> --}}
                            <div class="col-md-12 col-7">
                                <label for="phone" class="form-label">Enter Mobile</label><br>
                                <input type="number" class="@error('phone') is-invalid @enderror phone" name="phone[1]" value="" required>
                                <br>
                                <span id="valid-msg" class="hides">Valid</span>
                                <span id="error-msgs" class="hides">Invalid number</span>
                                @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="col">
                                <input class="@error('term_status') is-invalid @enderror" name="term_status" value="0" type="checkbox" id="gridCheck">
                                I have read and agreed to the <a href="javascript:;">Privacy Policy</a> and
                                <a href="javascript:;"> Terms and conditions. </a>
                                @error('term_status')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                                <button type="submit" class="btn-blue text-center" disabled>CONTINUE</button>
                            </div>
                        </form>
                        <div class="py-3 text-center">
                            <p >Any question?</p>
                            <span class="font-weight-bold">Already have an account?  
                                <a href="{{ url('/login') }}">Login</a>
                            </span> 
                        </div>
                        <div class="py-3 mt-5 text-center">
                            <span class="font-weight-bold">Please contact us at? 
                                <a href="mailto:care@lyfe.co.uk">Care@lyfe.co.uk</a>
                            </span> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
<script type="text/javascript">
    $(function () {
        $("#email-id").keyup(function () {
            //Reference the Button.
            var emailButton = $("#emailButton");
 
            //Verify the TextBox value.
            if ($(this).val().trim() != "") {
                //Enable the TextBox when TextBox has value.
                emailButton.removeAttr("disabled");
            } else {
                //Disable the TextBox when TextBox is empty.
                emailButton.attr("disabled", "disabled");
            }
        });
    });
</script>
<script>
let emailId = document.getElementById("email-id");
let errorMsg = document.getElementById("error-msg");
let icon = document.getElementById("icon");
let mailRegex = /^[a-zA-Z][a-zA-Z0-9\-\_\.]+@[a-zA-Z0-9]{2,}\.[a-zA-Z0-9]{2,}$/;
function checker() {
    icon.style.display = "inline-block";
    if (emailId.value.match(mailRegex)) {
        icon.innerHTML = '<i class="fas fa-check-circle"></i>';
        icon.style.color = "#2ECC71";
        errorMsg.style.display = "none";
        emailId.style.border = "1px solid #2ecc71";
    } else if (emailId.value == "") {
        icon.style.display = "none";
        errorMsg.style.display = "none";
        emailId.style.border = "1px solid #d1d3d4";
    } else {
        icon.innerHTML = '<i class="fas fa-exclamation-circle"></i>';
        errorMsg.style.display = "block";
        icon.style.color = "#FF2851";
        emailId.style.border = "1px solid #FF2851";
    }
}
</script>
<script>
    $('#emailButton').click(function(e){

        e.preventDefault();
        var email = $('[name="email"]').val()
            
            var data = {
                'email': email,
                 _token: $('[name="_token"]').val()

             }   
            $.ajax({
                url: "{{ route('verificationCode') }}",
                type: "POST",
                data: data,
                success: function(data) { 
                   $('#msg').html(data).fadeIn('slow');
                     $('#msg').html("Verification code has been send to your email...!").fadeIn('slow')
                     $('#msg').delay(10000).fadeOut('slow');
                     $('#inputPassword4').prop('disabled', false);
                 }
            });
    });
</script>
{{-- <script>
    $('#registerform').submit(function(e){

        e.preventDefault();
            data = $(this).serialize();
            $.ajax({
                url: "{{ route('register') }}",
                type: "POST",
                data: data,
                success: function(data) {
                    if (response.success == true)
                    {  
                        location.reload();
                    }
                 }
            });
    });

</script> --}}
<script>
    $(document).ready(function(){

        $(document).on("focusout","#inputPassword4",function(){
            var verification_no = $('[name="verification_no"]').val()
            var email = $('[name="email"]').val()
            var data = {
                'verification_no': verification_no,
                'email': email,
                 _token: $('[name="_token"]').val()
             }
            $.ajax({
                url: "{{ route('verification_no') }}",
                type: "POST",
                data: data,
                success: function(response) {
                    if (response.success == true){
                        $(':input[type="submit"]').prop('disabled', false);
                        //alert(response.success)
                        $('#verification_match').show();
                        $('#verification_not_match').hide();
                    }
                    if (response.success == false){
                        //alert(response.success)
                        $(':input[type="submit"]').prop('disabled', true);
                        $('#verification_not_match').show();
                        $('#verification_match').hide();

                    }
                 }
            });
        });
    });
</script>
@endsection
