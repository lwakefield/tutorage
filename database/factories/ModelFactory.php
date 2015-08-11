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

$factory->define(
    App\User::class, function ($faker) {
        return [
            'name' => $faker->name,
            'email' => $faker->email,
            'password' => bcrypt(str_random(10)),
            'remember_token' => str_random(10),
        ];
    }
);

$factory->define(
    App\Subject::class, function ($faker) {
        return [
            'code' => $faker->regexify('[A-Z]{4}[0-9]{4}'),
            'name' => $faker->sentence($nbWords = 4)
        ];
    }
);

$factory->define(
    App\Message::class, function ($faker) {
        return [
            'from_user' => -1,
            'to_user' => -1,
            'message' => ''
        ];
    }
);
