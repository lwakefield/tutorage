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

$factory->define(App\User::class, function ($faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Subreddit::class, function ($faker) {
    return [
        'name'  => $faker->company,
        'description' => $faker->catchPhrase
    ];
});

$factory->define(App\Post::class, function ($faker) {
    return [
        'title' => $faker->sentence(5),
        'content' => $faker->sentence(15),
        'score' => $faker->randomNumber(4),
        'user_id' => App\User::orderByRaw('RAND()')->first()->id,
        'subreddit_id' => App\Subreddit::orderByRaw('RAND()')->first()->id
    ];
});

$factory->define(App\Comment::class, function ($faker) {
    if (App\Comment::count()) {
        $model_class = rand(0,1) ? App\Post::class : App\Comment::class;
    } else {
        $model_class = App\Post::class;
    }
    $model_instance = new $model_class;
    return [
        'content' => $faker->sentence(15),
        'score' => $faker->randomNumber(4),
        'user_id' => App\User::orderByRaw('RAND()')->first()->id,
        'commentable_type' => $model_class,
        'commentable_id' => $model_instance->newQuery()->orderByRaw('RAND()')->first()->id
    ];
});

$factory->define(App\Vote::class , function ($faker) {
    $model_class = rand(0,1) ? App\Post::class : App\Comment::class;
    $model_instance = new $model_class;
    return [
        'dir' => rand(0,1) ? -1 : 1,
        'user_id' => App\User::orderByRaw('RAND()')->first()->id,
        'commentable_type' => $model_class,
        'commentable_id' => $model_instance->newQuery()->orderByRaw('RAND()')->first()->id
    ];
});
