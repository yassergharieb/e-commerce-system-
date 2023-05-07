<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Option extends Model
{
    use HasTranslations;

    public $translatable = ['name'];
    protected $fillable = ['attribute_id', 'product_id', 'name', 'price'];

    protected $table = 'products_attributes';
    public $timestamps = false;



    public function product() {
        return $this->belongsTo(Product::class , 'product_id');
    }
}
