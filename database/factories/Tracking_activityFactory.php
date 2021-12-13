<?php

use Faker\Generator as Faker;

$factory->define(App\Tracking_activity::class, function (Faker $faker) {
    return [
        'pupil_id' => App\Pupil::all()->random()->dni,
        'activity_id' => App\Activity::all()->random()->id,
        'comment' => $faker->sentence,
    ];
});
