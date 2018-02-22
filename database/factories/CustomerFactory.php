<?php

use Faker\Generator as Faker;

$factory->define(App\Customer::class, function (Faker $faker) {
    return [
        'customerName' => $faker->company,
        'contactLastName' => $faker->lastName,
        'contactFirstName' => $faker->firstName,
        'phone' => substr($faker->phoneNumber, 0, 12), // no extensions
        'addressLine1' => $faker->streetAddress,
        'addressLine2' => null,
        'city' => $faker->city,
        'state' => $faker->state,
        'postalCode' => $faker->postcode,
        //'country',
        //'salesRepEmployeeNumber',
        'creditLimit' => '1000.00'
    ];
});
