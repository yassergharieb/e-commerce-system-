<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Slider;
use App\Category;


use Illuminate\Http\Request;


class HomeController extends Controller
{



    public function index()
    {
      $data = [];
    //    $data['categories'] = Category::parent()->select('id','name' , 'slug');
      $data['sliders'] =  Slider::select('photo')->get();
      $data['categories'] = Category::parent()->select('id','category_name' , 'slug')
      ->with(['Childern'
       => function($q) {
            $q->select('category_name','id', 'parent_id' , 'slug')

      ->with(['Childern' => function($qq) {
            $qq->select('category_name','id', 'parent_id' , 'slug');
       }
        ]);
      }
    
    ])->get();
     
  
  

   
    
      return view('front.home' , compact('data') );
    }
}
