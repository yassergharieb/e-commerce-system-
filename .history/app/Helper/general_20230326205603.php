<?php


 function getFolder (){
   return app()->getLocale() ==  'ar' ? 'css-rtl' : 'css';
}


function uploadPhoto($folder , $image) {
$image->store('/', $folder);
$fileNmae =  $image->hashName();

return $fileNmae;
}
