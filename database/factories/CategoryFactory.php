<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Category;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category_name' => $faker->word() ,
        'slug' => $faker->slug(),
        'is_active' => $faker->boolean() ,



    ];
});
