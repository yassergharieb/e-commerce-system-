<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
   protected $fillable = ['photo' , 'created_at' , 'updated_at'];
   public $timestamps =  true;

   protected $hidden =  ['created_at' , 'updated_at'];


}
