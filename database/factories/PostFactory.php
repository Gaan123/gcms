<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'slug'=>$faker->slug,
        'excerpt'=>$faker->paragraph,
        'content'=>$faker->paragraph(3),
        'status'=>$faker->boolean,
    ];
});
