<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class User_verfication extends Model
{

    public $table =  'mobile_vertfication_codes';

     protected $fillable =  ['user_id', 'code' , 'created_at' , "updated_at"];

     public $timestamps =  true;


   




}
