<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use File;
use DB;

class GeneralSettingController extends Controller
{
    public function index()
    {
    	$setting = GeneralSetting::first();
    	return view('admin/generalsetting/index', compact('setting'));
    }

    public function create()
    {
    	return view('admin/generalsetting/index');
    }

   public function store(Request $request)
   {
      $request->validate([
			'title' => 'required',
			'logo' => 'required',
			'email' => 'required',
			'favicon' => 'required',
		], $messages = [
            'title.required' => 'The title field must be required*',
            'logo.required' => 'The logo field must be required*',
            'email.required' => 'The email field must be required*',
            'favicon.required' => 'The favicon field must be required*',
        ]);
      
      $fileName = null;
        if (request()->File('logo')) 
        {
            $file = request()->File('logo');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images'), $fileName);
        }

        $fileName1 = null;
        if (request()->File('favicon')) 
        {
            $file = request()->File('favicon');
            $fileName1 = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images'), $fileName1);
        }


      $generalsetting = new GeneralSetting([
			'title' => $request->get('title'),
			'email' => $request->get('email'),
			'address' => $request->get('address'),
			'favicon'  => $fileName1,
			'logo' => $fileName,
			'phone' => $request->get('phone'),
			'facebook' => $request->get('facebook'),
			'instagram' => $request->get('instagram'),
			'linkedin' => $request->get('linkedin'),
			'twitter' => $request->get('twitter')
		]);

		$generalsetting->save();
   	 return redirect('admin/generalsetting')->with('success', 'GeneralSetting is successfully created');
   }

   public function edit($id)
   {

	$setting = GeneralSetting::findOrFail($id);
   	return redirect('admin/generalsetting', compact('setting'));
   }

   public function update(Request $request, $id)
   {
    
     $request->validate([
      'title' => 'required',
      'email' => 'required',
    ], $messages = [
            'title.required' => 'The title field must be required*',
            'email.required' => 'The email field must be required*',
        ]);


   	    $setting = GeneralSetting::find($id);
        $currentImage = $setting->logo;
        $currentImage1 = $setting->favicon;

        $fileName = null;
        if (request()->File('logo')) 
        {
            $file = request()->File('logo');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images'), $fileName);
        }

        $fileName1 = null;
        if (request()->File('favicon')) 
        {
            $file = request()->File('favicon');
            $fileName1 = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('/assets/images'), $fileName1);
        }

		$generalsetting = array(
			'title' => $request->get('title'),
			'email' => $request->get('email'),
			'address' => $request->get('address'),
			'favicon'  => ($fileName1) ? $fileName1 : $currentImage1,
			'logo' => ($fileName) ? $fileName : $currentImage,
			'phone' => $request->get('phone'),
			'facebook' => $request->get('facebook'),
			'instagram' => $request->get('instagram'),
			'linkedin' => $request->get('linkedin'),
			'twitter' => $request->get('twitter')
		);
		  if ($fileName) {
            File::delete(public_path('/assets/images' . $currentImage));
        }
      if ($fileName1) {
            File::delete(public_path('/assets/images' . $currentImage1));
        }
        GeneralSetting::whereId($id)->update($generalsetting);
   	 return redirect('admin/generalsetting')->with('success', 'GeneralSetting is successfully Updated');
   }
}
