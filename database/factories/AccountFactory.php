<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Account;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

$factory->define(Account::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'store_name' => 'Toko '.$faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => Hash::make(123123), // password
        'remember_token' => Str::random(10),
        'role'=> 2,
    ];
});