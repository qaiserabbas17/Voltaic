<body class="email-body" style="margin:0; padding:0;">
    <table align="center" role="presentation" class="email-table" style="width:602px; border-collapse:collapse; border:2px solid #b9b7b7;">
    <tr>
        <td  align="center" class="logo-td" style="padding:50px 20px;">
            <img src="{{ asset('images/template-logo.png') }}">
        </td>
    </tr>
        <tr>
            <td class="em-content-area-td" style="padding:10px 20px;">
              <div style="background:#c1dbe4; display:block; padding:20px 15px 20px 15px; margin-bottom:45px; border-radius:5px">
                   <h2 class="text-center" style="text-align:center">Your code for lyfe</h2>
                   <span class="bgthemecolor d-fit-cont text-center text-white mar-auto" style="margin:0 auto; width: fit-content; display:block; padding: 20px 70px; border-radius: 5px; background: #00385D;">
                        <p style="margin-top:revert; color:#fff;">{{ $verification_no }}</p>
                   </span>
                   <br/>
                   {{-- <h5>Hi Johan Doe</h5> --}}
                   <p>Please enter above code to confirm your identity.  If you did not request this code, you can safely ignore this email.</p>
                   <br/>
                   <p>See you tomorrow!</p>
                   <p>Regards<br/>lyfe support.</p>
               </div>
            </td>
        </tr>
        <tr>
        <td class="bgthemecolor footer-pad" style="background:#00385D; padding:50px 20px; padding:50px 20px;">
            <p class="text-center text-white" style="color:#fff; text-align:center;">© 2021 LYFE All rights reserved</p>
            <div class="text-center  d-block text-white" style="color:#fff; display:block; text-align:center;">
                <a href="#" class="text-white" style="color:#fff;">Privacy Policy</a> | <a href="" class="text-white" style="color:#fff;"> Terms and Condition</a>
            </div>
            <div class="text-center email-icons d-block" style="display:block; margin-top:15px; text-align:center;">
              <a href="#" style="color:#00385d; margin-right: 5px; background: #fff; padding: 5px 8px; border-radius: 18px; font-size: 17px; text-decoration:none;"><i class="bx bxl-linkedin"></i></a>
              <a href="#" style="color:#00385d; margin-right: 5px; background: #fff; padding: 5px 8px; border-radius: 18px; font-size: 17px; text-decoration:none;"><i class="bx bxl-instagram"></i></a>
              <a href="#" style="color:#00385d; margin-right: 5px; background: #fff; padding: 5px 8px; border-radius: 18px; font-size: 17px; text-decoration:none;"><i class="bx bxl-facebook"></i></a>
            </div>
        </td>
    </tr>
    </table>
</body>