<?php

use Faker\Generator as Faker;

$factory->define(App\Orientation::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->dni,
        'counselor_id' => App\User::all()->random()->dni,
    ];
});
