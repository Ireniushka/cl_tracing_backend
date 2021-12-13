<?php

use Faker\Generator as Faker;

$factory->define(App\Activity::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'url' => 'https://www.google.com',
        'url_type' => $faker->randomElement(['web','file','nothing']),
        'enunciation' => $faker->paragraph,
        'description' => $faker->sentence,
        'materials' => $faker->sentence,
    ];
});
