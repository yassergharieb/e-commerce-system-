<?php

use App\Product;
use Illuminate\Database\Seeder;



class ProductDatabaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Product::class , 20)->create();

    }
}
