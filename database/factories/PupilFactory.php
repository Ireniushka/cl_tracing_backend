<?php

use Faker\Generator as Faker;

$factory->define(App\Pupil::class, function (Faker $faker) {
    return [
        'dni' => str_random(10),
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'course' => $faker->sentence,
    ];
});
