<?php

use App\Post;
use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'body' => $faker->paragraph,
        'slug' => $faker->word, // secret
        'category_id' => function(){
        	return factory('App\Category')->create()->id;
        },
    ];
});
