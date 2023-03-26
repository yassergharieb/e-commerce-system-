<?php

use App\Category;
use Illuminate\Database\Seeder;



class CategoryDatabaseSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       factory(Category::class , 20)->create();
    // Category::factory()->count(20)->create();
    }
}
