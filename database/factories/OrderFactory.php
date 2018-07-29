<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Item;

$factory->define(App\Model\Order::class, function (Faker $faker) {
    return [
        'uuid' => Uuid::generate(4)->string,
        'user_uuid' => User::getRandumUUID(),
        'item_uuid' => Item::getRandumUUID(),
        'created_at' => Carbon::now()->subDays(rand(6, 7))
    ];
});
