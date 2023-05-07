<?php


 function getFolder (){
   return app()->getLocale() ==  'ar' ? 'css-rtl' : 'css';
}


function uploadPhoto($folder , $image) {
try {
      $image->store('/', $folder);    
      $fileNmae =  $image->hashName();
      return $fileNmae;
  } catch (\Exception $ex) {
    return $ex->getMessage();
  }   

}



function SavePhoto($photo , $folder) {
    $file_extension =  $photo->getClientOriginalExtension();
    $file_name =  time().'.' . $file_extension;
    $path =  public_path($folder);
    $photo-> move($path ,  $file_name);
    return $file_name;
}