<?php

namespace App\Http\Controllers\Site;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
     public  function getProductsByCategorySlug($slug){
        $data =  [];

       $data['category']  = Category::with('products')->where('slug' , $slug )->first();
       if ( $data['category'] ) 
            $data['products'] =  $data['category']->products; 

         return view('front.Products' , $data);

     }


    public function showProductInfo($id){
      $product =  Product::where('id' , $id)->first();
     
      if (!$product){
          return redirect()->back()->with(['error' => 'some thing went wrong']);
      }
      return view('front.modal' , compact('product'));
    }  


}
