<?php

use Illuminate\Database\Seeder;
use Webpatser\Uuid\Uuid;
use App\Model\User;
use App\Model\Order;
use Carbon\Carbon;

class InvoiceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        foreach (range(1, 10) as $index) {
            
            DB::table('invoice')->insert([
                'uuid' => Uuid::generate(4)->string,
                'user_uuid' => User::getRandumUUID(),
                'order_uuid' => Order::getRandumUUID(),
                'paid_amount' => rand(100,100000),
                'created_at' => Carbon::now()->subDays(rand(5,4))
            ]);
        }
    }
}
