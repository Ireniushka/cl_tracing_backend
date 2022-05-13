<?php

use Faker\Generator as Faker;

$factory->define(App\Relation::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->id,
        'user_id' => App\User::all()->random()->id,
    ];
});
