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
      $categories = factory(Category::class , 20)->create();
       $categories->each(function ($category) use ($categories) {
        $parent = $categories->random();
        $category->parent_id = $parent->id;
        $category->save();
    });
    // Category::factory()->count(20)->create();
    }
}
