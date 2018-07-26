<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        
        foreach (range(1, 10) as $index) {
            
            DB::table('items')->insert([
                'uuid' => Uuid::generate(4)->string,
                'name' => $faker->name,
                'price' => $faker->numberBetween(20,2000),
                'created_at' => Carbon::createFromTimeStamp($faker->dateTime('-' . $faker->numberBetween(8,11) . ' days')->getTimestamp())
            ]);
        }
    }
}
