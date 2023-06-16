<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\wishList;
use Illuminate\Http\Request;

class WishListController extends Controller
{
  public function storeToUserWishList(Request $request)
  {
  //  $request->product_id;
   $product_id = request('product_id') ;


     $user = auth()->user();
    if (!$user->wishListHas(request($product_id)) ) {
      wishList::create(['user_id' => $user->id, 'product_id' => $product_id]);
    }
  }


  public function geProudctsInWishList(){
    $user =  auth()->user();
    $data =  [];

   $data['products'] =  $user->wishList;


   if($data['products']){
     return $data['similarties'] =  $data['products']->categories;
   }


   return view('front.wishlist' , $data);

  }
}
