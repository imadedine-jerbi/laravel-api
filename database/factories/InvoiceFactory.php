<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Order;

$factory->define(App\Model\Invoice::class, function (Faker $faker) {
    return [
        'uuid' => Uuid::generate(4)->string,
        'user_uuid' => User::getRandumUUID(),
        'order_uuid' => Order::getRandumUUID(),
        'paid_amount' => rand(100, 100000),
        'created_at' => Carbon::now()->subDays(rand(5, 4))
    ];
});
