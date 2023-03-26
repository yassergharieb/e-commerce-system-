<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    use \Spatie\Translatable\HasTranslations;

    protected $fillable =  ['category_name' , 'slug' , 'parent_id' , 'is_active' , 'created_at', 'updated_at'];
    protected $translatable =  ['category_name'];

    protected $hidden =  ['created_at' , 'updated_at'];

    public $timestamps =  true;

    protected $Casts =  ['is_active' => 'boolean'];

public function scopeParent($query) {
return $query->whereNull('parent_id');

}

public function scopeChild($query) {
    return $query->whereNotNull('Parent_id');
}


public function getActive () {
    return $this->is_active == '0' ? 'غير مفعل' : 'مفعل';
}


public function _parent  () {
    return $this->belongsTo(self::class , 'parent_id');
}
}
