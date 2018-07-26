<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;

/**
 * 
 */
class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        
        $faker = Faker\Factory::create();
        
        foreach (range(1, 10) as $index) {
            
            DB::table('users')->insert([
                'uuid' => Uuid::generate(4)->string,
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => bcrypt('secret'),
                'created_at' => Carbon::createFromTimeStamp($faker->dateTime('-' . $faker->numberBetween(9,10) . ' days')->getTimestamp())
            ]);
        }
    }

}
