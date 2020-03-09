<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customer;
use Faker\Generator as Faker;

$factory->define(Customer::class, function (Faker $faker) {
    return [
       'username' => $faker->userName,
        'amount_to_bill' => $faker->numberBetween($min = 1000, $max = 9000),
        'mobile_number' => $faker->phoneNumber
    ];
});
