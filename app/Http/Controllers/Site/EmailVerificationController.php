<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\User_verfication;
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
       $user  =  User_verfication::whereId(auth()->id())->first(); 
       $code =  $user->code;
       if ($request->code == $code){

       
       User::where('id' , auth()->id())->update(['email_verified_at' => now()]);
        // dd($user);
        return redirect()->route('profile');
       } else {
        return redirect()->to('/verify' , 404 , ['error' => 'some thing went wrong']);
        // return redirect()->back()->with(['error' => 'some thing went wrong ']);
       }
    }
}
