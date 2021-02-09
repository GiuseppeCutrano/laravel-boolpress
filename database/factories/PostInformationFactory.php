<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostInformationModel;
use Faker\Generator as Faker;

$factory->define(PostInformationModel::class, function (Faker $faker) {
    return [
        "description" => $faker->paragraph(),
        "slug" =>$faker->slug(),
        'post_id' =>$faker->unique()->numberBetween(1,100), 
    ];
});
