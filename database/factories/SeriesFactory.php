<?php

use Faker\Generator as Faker;

$factory->define(\App\Series::class, function (Faker $faker) {
    $title = $faker->sentence(5);
    return [
        'title' => $title,
        'slug' => str_slug($title),
        'image_url' => asset('img/series.jpg'),
        'description' => $faker->paragraph()
    ];
});
