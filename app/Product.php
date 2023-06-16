<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    use \Spatie\Translatable\HasTranslations;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'brand_id',

        'selling_price',
        'price',
        'special_price_type',
        'special_price_start',
        'special_price_end',
        'sku',
        'manage_stock',
        'is_active',
        'qty',
        'in_stock'


    ];
    protected $translatable = ['name', 'description', 'short_description'];

    protected $hidden = ['created_at', 'updated_at'];

    public $timestamps = true;

    protected $Casts = [
        'is_active' => 'boolean',
        "in_stock" => "boolean",
        'manage_stock' => 'boolean',
    ];

    protected $dates = [
        'special_price_start',
        'special_price_end',
        'deleted_at'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'products_tags');
    }


    public function getActive()
    {
        return $this->is_active == '0' ? 'غير مفعل' : 'مفعل';
    }


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }




    public function options()
    {
        return $this->hasMany(Option::class, 'product_id');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }




    public function Photos()
    {
        return $this->hasMany(Image::class, 'product_id');

    }

    public function wishList(){
        return $this->belongsToMany(User::class , 'wish_list');
    } 


}
