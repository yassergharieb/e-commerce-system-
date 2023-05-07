<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Http\services\VerficationCodeService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use DB;

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


     public $userVerficationCode;
    public function __construct(VerficationCodeService $userVerficationCode)
    {
        $this->userVerficationCode =  $userVerficationCode;
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
            'name' => ['required', 'string', 'max:255'],
            'mobile' => ['required', 'string', 'max:255', 'unique:users'],
            'Email' => ['required', 'string', 'Email' ,  'max:255', 'unique:users'],

            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        try {
         DB::beginTransaction();
        $verificationUser =  [];

      
        $user = User::create([
            'name' => $data['name'],
            'mobile' => $data['mobile'],
            'Email'  => $data['Email'],
            'password' => Hash::make($data['password']),
        ]);
           

         $verificationUser['user_id'] =  $user->id;
         $this->userVerficationCode->SendVerificationCode($verificationUser);
         $this->userVerficationCode->sendEmailWithVerificatinCode($user , $user->codes
        );
          DB::commit();
             return $user;
        } catch (\Exception $ex) {
          DB::rollBack();
          return redirect()->back()->with(['error' => 'something went wrong']);
        }

    }
}