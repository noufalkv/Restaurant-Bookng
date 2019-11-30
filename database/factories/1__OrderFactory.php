<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'resto_id' => 1,
        'user_id' => 1,
        'amount' => $faker->numberBetween(99, 500),
        'isComplete' => $faker->randomElement([1,0]),
        'completed_at' => $faker->date('Y-m-d h:m:s'),
        'order_details' => [
            'items' => [1,2,3],
            'customer_name' => $faker->name,
            'customer_phone' => $faker->phoneNumber,
            'customer_address' => $faker->address,
        ]
    ];
});
