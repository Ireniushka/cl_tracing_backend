<?php

use Faker\Generator as Faker;

$factory->define(App\Tutelage::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->dni,
        'legal_tutor_id' => App\User::all()->random()->dni,
    ];
});
