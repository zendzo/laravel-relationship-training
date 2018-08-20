<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    $commentable = ['App\Post','App\Video'];
    return [
        'body'  => $faker->paragraph,
        'commentable_id'    => rand(1,10),
        'commentable_type'       => $commentable[rand(0,1)]
    ];
});
