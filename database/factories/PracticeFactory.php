<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Practice;
use Faker\Generator as Faker;

$factory->define(Practice::class, function (Faker $faker) {
    return [
        "name"=>$faker->sentence(3),
        "description"=>$faker->paragraph(3),
        "completed"=>0
    ];
});
