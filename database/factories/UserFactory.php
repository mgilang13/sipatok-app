<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(User::class, function (Faker $faker) {
    $username = $faker->unique()->safeEmail;
    $phone = $faker->unique()->e164PhoneNumber;
    
    return [
        'username' => $username,
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phone' => $phone,
        // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'password' => bcrypt($phone),
        'remember_token' => Str::random(10),
    ];
});
