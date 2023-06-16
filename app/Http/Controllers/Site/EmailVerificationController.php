<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User_vertification;
use Illuminate\Http\Request;
use App\User;

class EmailVerificationController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function verify(Request $request)
    {
        $id =  auth()->id();
       $user  =  User_vertification::where('user_id', '=' , $id)->first(); 
       $code =  $user->code;
       if ($request->code == $code){

       
       User::where('id' , auth()->id())->update(['email_verified_at' => now()]);
         
        return redirect()->route('profile');
       } else {
        return redirect()->to('/verify' , 404 , ['error' => 'some thing went wrong']);
       
       }
    }



    public function confirmationForm() {
        return "test";
    }
}
