<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Attribute extends Model
{
     use HasTranslations;


     protected $fillable =  ['name' , 'created_at' , "updated_at"];
     protected $translatable =  ['name'];
     public $timestamps =  true;


    public function products () {
        return $this->belongsTo(Product::class , 'product_id');
    }




}
