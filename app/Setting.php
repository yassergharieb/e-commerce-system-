<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use \Spatie\Translatable\HasTranslations;

    protected $translatable =  ['translations'];
    protected $fillable =  ['setting_name' , 'setting_value' , 'created_at' , 'updated_at' , 'translations'];

    protected $hidden =  ['created_at' , 'updated_at'];

    public $timestamps =  true;

    // protected $casts =  ['translations' => 'array'];




    public static function setMany($settings =  []) {
          foreach($settings as $key => $value) {
            self::set($key , $value);
          }
    }



    public static function set ($key , $value) {

           if(is_array($value) && !key_exists('ar' , $value)) {
            $value =  json_encode($value);

            static::updateOrCreate(['setting_name' => $key ,  'setting_value' => $value]);

           }
           elseif( is_array($value) && key_exists('ar' , $value)) {
            // $value =  json_encode($value);

            static::updateOrCreate(['setting_name' => $key ,  'translations' => $value]);

           }else {
            static::updateOrCreate(['setting_name' => $key ,  'setting_value' => $value]);
        }
           }




}
