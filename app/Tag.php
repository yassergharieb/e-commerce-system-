<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Tag extends Model
{
     use HasTranslations;


     protected $fillable =  ['tag_name' , 'slug' , 'created_at' , "updated_at"];
     protected $translatable =  ['tag_name'];
     public $timestamps =  true;





}
