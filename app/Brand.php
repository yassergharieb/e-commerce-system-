<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use \Spatie\Translatable\HasTranslations;


    protected $fillable =   ['brand_name' , 'is_active' , 'photo', 'created_at' , 'updated_at'];
    protected $hidden =  [ 'created_at' , 'updated_at'];
    protected $translatable = ['brand_name'];
    public  $timestamps =  true;


    protected $Casts =  ['is_active' => 'boolean'];


    public function getPhotoAttribute($val) {
        return ($val != null) ? asset ('assets/images/brands/' .$val) : "";
    }


    protected function scopeActive($query){
        return $query->where('is_active', 1);
    }

}
