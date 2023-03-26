<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public  function Login() {
        return view('admin.auth.login');


    }


    public  function LoginAuth(AdminLoginRequest  $request) {


        dd(auth()->guard('admin')->attempt(['email' => $request->input('email'),
        'name' => $request->input('password')]));
      if (auth()->guard('admin')->attempt(['email' => $request->input('email'),
             'passowrd' => $request->input('password')]))
          {
            return redirect()->route('admin.dashboard');
          } else {
            return redirect()->back()->with(['error' =>'حدث خطأ في تسجيل الدخول']);

          }


    }



    public function logout () {
        $admin  =  auth('admin');
        $admin->logout();
        return redirect()->route('admin.login');

    }

}






