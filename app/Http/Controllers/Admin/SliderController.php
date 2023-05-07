<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;

/**
 * Summary of AdminProfileController
 */
class SliderController extends Controller
{

   public function addImages(){

    return view('admin.Slider.imagesForm');

   }

   public function storeImag(Request $request){
  

    if ($request->hasFile('photos')) {

        $files = $request->file('photos');
    
        foreach ($files as $file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

        
            $file_name =  time().'.' . $extension;
          

            $folder =  'public/assets/images/slider';
            $path = public_path('assets/images/slider');
            if (!$file->move($path, $filename)) {
            return redirect()->back()->with(['error' => 'unsuccessful upload']);

            }
         Slider::create(['photo' => $folder.'/'.$filename]);   

        }
        
    return redirect()->back()->with(['success' => 'successful upload']);


    }

}


   

   public function SaveImagesToDB(){

   }



}