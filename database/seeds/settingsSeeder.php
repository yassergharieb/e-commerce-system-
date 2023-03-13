<?php

use App\Setting;
use Illuminate\Database\Seeder;

class settingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::setMany([
          'defult_local' => 'ar' ,
          'default_TimeZone' => 'Africa/cairo',
          'default_currency' => 'USD',
          'store_email' => 'yassergh@gmail.com',
          'serch_engine' => 'mysql',
          'serach_engine' => 'mysql',

          'Supported_currencies' => ['USD' , 'LE' , 'SAR'],
          'auto_approve_review' => true,
          'review_enable' => true,
          'flat_rate_cost' => 0,
          'local_bickup_cost' => 0,


           'free_shiping_cost' => 0,
           'local_shiping_cost' => 0,
           'outer_shiping_cost' => 0,
             'store_name' => ['en' => 'yasser store' , 'ar' => 'المتجر'],
             'free_shiping_lable' => ['en' => 'free shiping' , 'ar' => 'التوصيل المجاني'],
             'local_shiping_lable' => ['en' => 'locla shiping' , 'ar' => 'التوصيل الداخلي'],
             'outer_shiping_lable' => ['en' => "outer shiping" , 'ar' => 'التوصيل الخارجي '],





        ]);
    }
}
