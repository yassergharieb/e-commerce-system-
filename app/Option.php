<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Option extends Model
{
    use HasTranslations;

    public $translatable = ['option_name'];
    protected $fillable = ['attribute_id', 'product_id', 'option_name', 'price' , 'created_at' , 'updated_at'];

    protected $table = 'products_attributes';
    
    public $timestamps = true;



    public function product() {
        return $this->belongsTo(Product::class , 'product_id');
    }
}
