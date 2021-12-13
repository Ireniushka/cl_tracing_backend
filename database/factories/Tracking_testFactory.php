<?php

use Faker\Generator as Faker;

$factory->define(App\Tracking_test::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->dni,
        'result' => $faker->randomElement(['DDDD','IIII','DIDI']),
        'comment' => $faker->sentence,
    ];
});
