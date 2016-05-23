<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/
$factory->define(App\User::class, function(Faker\Generator $faker) {
    return [
    'name' => $faker->name,
    'email' => $faker->safeEmail,
    'password' => bcrypt('123123123'),
    'location' => $faker->address,
    'profile_photo' => $faker->imageUrl($width = 304, $height = 228),
    'presentation' => $faker->text(),
    'remember_token' => str_random(10),
    ];
});
