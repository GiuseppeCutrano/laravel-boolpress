<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\CategoriesModel;
use Faker\Generator as Faker;

$factory->define(CategoriesModel::class, function (Faker $faker) {
    $title = implode(" ", $faker->words(2));
    $slug = Str::slug($title, "-");
    
    return [
        "title" => $title,
        "slug" => "/" . $slug,

    ];
});

