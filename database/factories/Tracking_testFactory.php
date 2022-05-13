<?php

use Faker\Generator as Faker;

$factory->define(App\Tracking_test::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->id,
        'lat_cruzada' => $faker->boolean,
        'comment' => $faker->sentence,
    ];
});
