<?php

use App\Project;
use Faker\Generator as Faker;

$factory->define(App\Project::class, function (Faker $faker) {
    return [
    	'title' => $faker->sentence,
    	'description' => $faker->paragraph,
    	'type' => 'youtube',
    	'url' => $faker->url,
    	'client' => $faker->name,
    	'thumbnail' => $faker->word,
    ];
});