<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class User_vertification extends Model
{

    public $table =  'user_verifications';

     protected $fillable =  ['user_id', 'code' , 'created_at' , "updated_at"];

     public $timestamps =  true;


   




}
