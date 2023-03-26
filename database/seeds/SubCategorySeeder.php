<?php

use Illuminate\Database\Seeder;

use App\Category;
class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class , 10)->create([
            'parent_id' => $this->getParentId()
        ]);
    }


    private function getParentId() {

        return Category::inRandomOrder()->first();

    }
}


