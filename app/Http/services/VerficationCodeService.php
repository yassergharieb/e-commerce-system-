<?php

namespace App\Http\services;


use App\Mail\VerificationMail;
use App\User_verfication;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
class VerficationCodeService 
{

public function SendVerificationCode($data) {
     $code =  mt_rand(100000 , 999999);
     $data['code'] =  $code;
    User_verfication::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
    // User_verfication::whereNotNull('user_id')->where(['user_id' => $data['user_id']])->delete();
    return User_verfication::create($data);
    
    }


 public function sendEmailWithVerificatinCode($user ,  $code){

    $user_email = $user->Email;
         
    Mail::to($user_email)->send(new VerificationMail($code));
    
 } 
}