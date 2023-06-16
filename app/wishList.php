<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class wishList extends Model
{

    protected $table =  'wish_list';
    protected  $fillable =  ['product_id' , 'user_id'];
    public $timestamps =  true; 

    
}
