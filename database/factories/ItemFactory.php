<?php

use Faker\Generator as Faker;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

$factory->define(App\Model\Item::class, function (Faker $faker) {
    return [
            'uuid' => Uuid::generate(4)->string,
            'name' => $faker->name,
            'price' => $faker->numberBetween(20, 2000),
            'created_at' => Carbon::createFromTimeStamp($faker->dateTime('-' . $faker->numberBetween(8, 11) . ' days')->getTimestamp())
    ];
});