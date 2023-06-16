<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class productCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $originalArray = [
            ['product_id' => 1,        'category_id' => 1,],
            ['product_id' => 1,        'category_id' => 2,],
            ['product_id' => 2,        'category_id' => 2,],

        ];

        $repeatedArray = [];

        for ($i = 0; $i < 20; $i++) {
            $copy = [];

            foreach ($originalArray as $item) {
                $newItem =
                [
                'product_id' => rand(1, 20),            
                'category_id' => rand(1, 20),
                ];

                $copy[] = array_merge($item, $newItem);
            }

            $repeatedArray = array_merge($repeatedArray, $copy);
        }
        DB::table('product_categories')->insert($repeatedArray);
    }
}
