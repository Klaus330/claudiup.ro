<?php

use App\Skill;
use Faker\Generator as Faker;

$factory->define(App\Skill::class, function (Faker $faker) {
    return [
    	'name' => $faker->word,
    	'experience_level' => $faker->numberBetween($min = 1,$max =  5)
    ];
});

