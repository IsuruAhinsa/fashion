<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $name = $faker->name,
        'slug' => Str::slug($name),
        'details' => $faker->sentence(6, true),
        'price' => $faker->randomNumber(),
        'description' => $faker->text(500),
    ];
});
