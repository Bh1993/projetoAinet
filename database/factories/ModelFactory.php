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

/*$factory->define(App\User::class, function(Faker\Generator $faker) {
    return [
    'name' => $faker->name,
    'email' => $faker->safeEmail,
    'password' => bcrypt('123123123'),
    'location' => $faker->address,
    'profile_photo' => $faker->imageUrl($width = 304, $height = 228),
    'presentation' => $faker->text(),
    'remember_token' => str_random(10),
    'sells_evals' => $faker->numberBetween($min = 0, $max = 30),
    'buys_evals' => $faker->numberBetween($min = 0, $max = 30),
    'sells_count' => $faker->numberBetween($min = 0, $max = 30),
    'buys_count' => $faker->numberBetween($min = 0, $max = 30),
    ];
});

$factory->define(App\Advertisement::class, function(Faker\Generator $faker) {
    $users = App\User::all();
    return [
    'owner_id' => $users->random()->id,
    'name' => $faker->name,
    'description' => $faker->text(),
    'available_on' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'available_until' => $faker->date($format = 'Y-m-d', $max = 'now'),
    'price_cents' => $faker->numberBetween($min = 10, $max = 200),
    'quantity' => $faker->randomNumber($nbDigits = NULL),
    'trade_prefs' => $faker->text(),
    
    ];
});

$factory->define(App\Media::class, function(Faker\Generator $faker){
    return [
    'advertisement_id' => 1,
    'media_url' => $faker->url,
    'photo_path' => $faker->imageUrl($width = 304, $height = 228),
    ];
});

$factory->define(App\Comment::class, function(Faker\Generator $faker){
    $advertisements = App\Advertisement::all();
    $users = App\User::all();
    $comments = App\Comment::all();
    return [
    'advertisement_id' => $advertisements->random()->id,
    'user_id' => $users->random()->id,
    'comment' => $faker->text(),
    'parent_id' => NULL,
    ];
});



/*
$factory->define(App\Tag::class, function(Faker\Generator $faker){
    $tags = App\Advertisement::all();
    
    return [
    'name' => $faker->word(),
    
    ];
});
*/

