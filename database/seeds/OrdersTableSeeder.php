<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use Carbon\Carbon;
use App\Model\User;
use App\Model\Item;

class OrdersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        
        
        foreach (range(1, 200) as $index) {
            
            DB::table('orders')->insert([
                'uuid' => Uuid::generate(4)->string,
                'user_uuid' => User::getRandumUUID(),
                'item_uuid' => Item::getRandumUUID(),
                'created_at' => Carbon::now()->subDays(rand(6,7))
            ]);
        }
    }

}
