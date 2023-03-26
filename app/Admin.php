<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Illuminate\Database\Eloquent\Model;

class Admin extends Authenticatable
{


   protected  $table =  'admins';

   protected  $fillable =  ['name' ,'email' , 'passowrd' , 'created_at' , 'updated_at'];
   protected $hidden =  ['created_at' , 'updated_at'];
   public $timestamps =  true;
}
