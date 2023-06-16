<?php

namespace App\Http\Controllers\Site;

use App\Basket\Basket;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{


  protected $basket;
  protected $id;  


  public function __construct(Basket $basket) {
          $this->basket =  $basket;
  }


 public function getIndex () {
    $basket  =  $this->basket;


    return view('front.cart.index' , compact('basket'));

 }  



 public function addToCard(Request $request){
    $this->basket->add($request->product , $request->quantity);

 } 




}
