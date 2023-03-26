<?php


 function getFolder (){
   return app()->getLocale() ==  'ar' ? 'css-rtl' : 'css';
}


function uploadPhoto($folder , $image) {
$image->store('/', $folder);
$fileNmae =  $image->hashName();
$path = 'images/' . $folder. '/' . $fileNmae;
return $path;
}
