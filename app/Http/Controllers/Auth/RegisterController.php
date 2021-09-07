<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\EmailVerification;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Mail;
use Response;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required'],
            'role_id' => 'required',
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'term_status' => 'required',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $success = false;
        $code_verfied = EmailVerification::where('verification_no', $data['verification_no'])->first();

        if($code_verfied){
            $success = true;
            return User::create([
                'firstname' => $data['firstname'],
                'lastname' => $data['lastname'],
                'phone' => implode('', $data['phone']),
                'role_id' => $data['role_id'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'term_status' => $data['term_status'] == null ? '0': '1',
            ]);
                
        }

        return Response::json(['success' => $success]);

    }

    public function verificationCode(Request $request)
    {
        
        $email = $request->email;
        $data = [
          'subject' => 'Registeration code',
          'verification_no'=> date("is"),
          'email' => $email
        ];

        $email_verfied = EmailVerification::where('email', $email)->delete();
        
        EmailVerification::create([
            'email' => $email,
            'verification_no' => date("is"),
        ]);

        
        Mail::send('email/verified-template', $data, function($message) use ($data) {
          $message->to($data['email'])
          ->subject($data['subject']);
        });
    }

    public function verification_no(Request $request)
    {
        
        $code = $request->verification_no;
        $email = $request->email;
        
        $success = false;
        $code_verfied = EmailVerification::where('email', $email)->where('verification_no', $code)->first();

        if($code_verfied){
            $success = true;        
        }

        return Response::json(['success' => $success]);
    }

    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        // $this->guard()->login($user);

        return $this->registered($request, $user)
                        ?: redirect('/login')->with('success', 'Before proceeding, please check your email for a verification link.');
    }

}
