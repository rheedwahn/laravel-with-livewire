<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->word(),
        'description' => $faker->realText(),
    ];
});
