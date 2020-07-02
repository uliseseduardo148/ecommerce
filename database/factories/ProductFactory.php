<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(15),
        'slug'=> $faker->sentence(15), 
        'description'=> $faker->sentence(15),
        'price'=> $faker->numberBetween(100,9000),
        'image_path'=> $faker->sentence(15),
        'status'=> $faker->numberBetween(0,1),
    ];
});
