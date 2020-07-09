<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' => $facker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(3),
        'image' => 'uploads/products/book.png',
        'description' => $faker->paragraph(4),
        'price' => $faker->numberBetween(100, 10000),
      
    ];
});
