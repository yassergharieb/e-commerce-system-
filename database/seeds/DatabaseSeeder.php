<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // $this->call(settingsSeeder::class);
        $this->call(CategoryDatabaseSeed::class);
        $this->call(ProductDatabaseSeed::class);
        $this->call(SubCategorySeeder::class);
    }
}
