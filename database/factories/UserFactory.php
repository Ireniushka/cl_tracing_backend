<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'dni' => str_random(10),
        'type' => $faker->randomElement(['counselor', 'legal_tutor']),
        'name' => $faker->name,
        'last_name' => $faker->lastName,
        'username' => $faker->unique()->username,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
        'passChanged' => $faker->boolean,
        'remember_token' => str_random(10),
    ];
});
