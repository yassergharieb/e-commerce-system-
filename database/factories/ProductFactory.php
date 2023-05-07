<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->text(60) ,
        'description' => $faker->text(30) ,
        'short_description' => $faker->text(20),

        'price' => $faker->numberBetween(100 , 900) ,
        'manage_stock' => false ,
        'slug' => $faker->slug(),
        'sku' => $faker->word(),
        'is_active' => $faker->boolean() ,
        'in_stock' => $faker->boolean() ,




    ];
});
