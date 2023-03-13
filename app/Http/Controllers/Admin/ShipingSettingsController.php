<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mcamara\LaravelLocalization\LaravelLocalization;

class ShipingSettingsController extends Controller
{
      public function shipingMesthodDetails () {

      }


      public function EditShipingMesthodDetails ($type) {

         if ($type ==  'free') {
            $setting = Setting::where('setting_name->en','free_shiping_lable')
            ->get();
         } elseif ($type ==  'local'){
            $setting = Setting::where('setting_name->en','local_shiping_lable')
            ->get();
         } elseif($type ==  'outer') {
            $setting = Setting::where('setting_name->en','outer_shiping_lable')
            ->get();
         }  else {
            $setting = Setting::where('setting_name->en','free_shiping_lable')
            ->get();
         }

         $shiping_mehtod = $setting[0];
          $local =  app()->getLocale();

        //  return $free_setting->getTranslation('setting_value' , 'ar');
        return view('admin.shiping.edhitshipingmethod' , compact('shiping_mehtod' , 'local'));

      }


      public function UpdateShipingMesthodDetails () {

      }
}
