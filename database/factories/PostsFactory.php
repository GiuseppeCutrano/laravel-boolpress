<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PostModel;
use Faker\Generator as Faker;

$factory->define(PostModel::class, function (Faker $faker) {
    return [
        "title" => "Titolo:". " ". implode(" ",$faker->words(2)),
        "author"=> $faker->name(),
        "category_id" => $faker->numberBetween(1,5),
    ];
});