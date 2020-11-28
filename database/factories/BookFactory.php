<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Book;
use Faker\Generator as Faker;

$factory->define(Book::class, function (Faker $faker) {
    return [
        'user_id' =>$faker->randomElement([1,2,3,4,5,6,7,8,9,10]),
        'title' =>$faker->randomElement(['Data Structor IV Edition','Java V Edition','Php: The Basics']),
        'author' =>$faker->name,
        'copyright_year'=>$faker->dateTimeBetween(\Illuminate\Support\Carbon::now(),\Carbon\Carbon::now()->addCenturies()),
        'publisher' =>$faker->name,
        'unit_price'=>$faker->randomElement([500,5000]),
        'description' =>$faker->paragraph(2),
        'category_id' =>$faker->randomElement([1,2,3,4,5,6]),
        'status' => $faker->randomElement(['available','reserved']),
        'quantity' =>$faker->randomElement([1,2,3,4,5])
    ];
});
