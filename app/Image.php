<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

   protected $table =  'product_images';
   protected $fillable =  ['photo' , 'product_id' , 'created_at' , 'updated_at'];
   public $timestamps =  true;



   public function Product(){
    return $this->belongsTo(Product::class , 'product_id');
   }  


}
