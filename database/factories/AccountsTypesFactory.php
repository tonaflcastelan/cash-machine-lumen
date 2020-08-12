<?php

use App\Account;
use App\LuAccountType;
use App\User;
use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(LuAccountType::class, function (Faker\Generator $faker) {
    $year = mt_rand(2015, 2023);
    $month = mt_rand(01, 12);
    $day = mt_rand(01, 31);
    $randomDate = $year . "-" . $month . "-" . $day;

    return [
        'user_id' => User::all()->random()->id,
        'account_number' => rand(1111111111, 9999999999),
        'credit_line' => 50000.00,
        'available_credit' => 50000.00,
        'type_id' => rand(1, 2),
        'expires' => Carbon::createFromFormat('Y-m-d', $randomDate)
    ];
});