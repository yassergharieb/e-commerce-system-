<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use \Spatie\Translatable\HasTranslations;


    protected $fillable =   ['brand_name' , 'is_active' , 'created_at' , 'updated_at'];
    protected $hidden =  [ 'created_at' , 'updated_at'];
    protected $traslatable = ['brand_name']; 
    public  $timestamps =  true;

}
