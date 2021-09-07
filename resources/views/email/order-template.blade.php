<body class="email-body" style="margin:0; padding:0;">
    <table align="center" role="presentation" class="email-table" style="width:602px; border-collapse:collapse; border:2px solid #b9b7b7;">
    <tr>
        <td  align="center" class="logo-td" style="padding:50px 20px;">
            <img src="{{ asset('images/template-logo.png') }}">
        </td>
    </tr>
    <tr>
        <td class="em-content-area-td" style="padding:10px 20px;">
          <div style="background:#c1dbe4; display:block; padding:20px 15px 20px 15px; margin-bottom:45px;border-radius:5px">
               <p style="text-align:center">Hi {{ $user->firstname }} {{ $user->lastname }}</p>
               <img style="width:400px; display:block; margin:40px auto;" src="{{ asset('images/thankyou.png') }}">
               <p class="text-center" style="text-align:center;">We  got your order! we will let you know when its shipped and headed your way</p>
               <a href="{{ url('/order') }}" class="email-btn" style="display: block; margin: 15px auto;color: #fff; text-decoration: none; background: #00385D; width: fit-content; padding: 15px 35px; border-radius: 5px;">VIEW ORDER</a>
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