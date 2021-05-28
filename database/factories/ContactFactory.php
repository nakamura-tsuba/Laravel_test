<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Bbs;
use Faker\Generator as Faker;

$factory->define(Bbs::class, function (Faker $faker) {
    return [
        'your_name' => $faker->name,
        'title' => $faker->realText(50),
        'email' => $faker->unique()->email,
        'url' => $faker->url,
        'gender' => $faker->randomElement(['0', '1']),
        'age' => $faker->numberBetween($min = 1, $max = 6),
        'contact' => $faker->realText(200),
        'category_id' =>$faker->randomElement(['1', '2','3']),
    ];
});
