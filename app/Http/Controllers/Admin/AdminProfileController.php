<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use App\Http\Requests\AdminProfileRequest;
use Illuminate\Http\Request;

/**
 * Summary of AdminProfileController
 */
class AdminProfileController extends Controller
{
     public function editProfile() {
      $admin =  Admin::find(auth('admin')->user()->id);
    //   dd(auth('admin')->user());
        //  $admin;
        return view('admin.profile.edit', compact('admin'));
     }



     /**
      * Summary of UpdateProfile
      * @param AdminProfileRequest $request
      * @return void
      */
     public function UpdateProfile (AdminProfileRequest  $request) {

       try {
         $admin =  Admin::find(auth('admin')->user()->id);
         if ($request->filled('password')) {
             $request->merge(['passsword' => bcrypt($request->password)]);
         }
        unset($request['id']);
        unset($request['password_confirmation']);

         $admin->update($request->all());
         return redirect()->back()->with(['success' => 'your profile is successfully updated']);

       }  catch(\Exception $e ) {
           return redirect()->back()->with(['error' => 'there is some thing wrong']);
       }





     }
}
