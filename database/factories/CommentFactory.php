<?php

use Faker\Generator as Faker;
use App\User;
use App\Board;

$factory->define(App\comment::class, function (Faker $faker) {
	$minId = User::min('id'); //select min(id) from users;
	$maxId = User::max('id'); //select max(id) from users;
	$minId_board = Board::min('id'); //select min(id) from users;
	$maxId_board = Board::max('id'); //select max(id) from users;
    return [

        'content' => $faker->sentence,
        'user_id' => $faker->numberBetween($minId,$maxId),
        'board_id' => $faker->numberBetween($minId_board,$maxId_board),
    ];
});
