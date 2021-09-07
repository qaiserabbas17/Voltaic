<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Event;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\Role;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        return view('admin/users/index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $roles = Role::get();
        return view('admin/users/create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        //User::create($request->all());

        $User = new User([
            'firstname' => $request->get('firstname'),
            'lastname' => $request->get('lastname'),
            'phone' => $request->get('phone'),
            'role_id' => $request->get('role_id'),
            'email' => $request->get('email'),
            'password' =>  Hash::make($request->get('password'))
        ]);
        $User->save();
        return redirect('/admin/users')->with('success', 'User has been added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id', $id)->first();
        $roles = Role::get();
        return view('admin/users/edit', compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if($request->oldpassword){
            $request->validate([
                'firstname' => ['required', 'string', 'max:255'],
                'lastname' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:13'],
                'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user->id)],
                'oldpassword' => [  
                    'required',             
                    function ($attribute, $value, $fail) use ($user) {
                        if (!Hash::check($value, $user->password)) {
                            $fail('Your password was not updated, since the provided current password does not match.');
                        }
                    }
                ],
                'password' => ['required', 'string', 'min:8', 'confirmed']

            ]);
        }
        else{
           $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:13'],
            'email' => ['required', 'string', 'email', 'max:255',Rule::unique('users')->ignore($user->id)]
            ]);
        }
        
        

        $User = User::find($id);
        $User->firstname = $request->get('firstname');
        $User->lastname = $request->get('lastname');
        $User->phone = $request->get('phone');
        $User->role_id = $request->get('role_id');
        $User->email = $request->get('email');
        if($request->oldpassword){
            $User->password = Hash::make($request->get('password'));
        }
        $User->save();

        return redirect('/admin/users')->with('success', 'User details has been Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $User = User::find($id);
        $User->delete();

        return redirect('/admin/users')->with('delete', 'User has been deleted!');
    }
}
