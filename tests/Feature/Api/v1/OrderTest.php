<?php

namespace Tests\Feature\Api\v1;

use Tests\Feature\Api\ApiModel;
use App\Model\Order;
use Webpatser\Uuid\Uuid;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class OrderTest extends ApiModel {

    public function testGetAll() {

        $this->assertSuccessGetAll('v1', 'orders?page=1');
        $this->assertSuccessGetAll('v1', 'orders');
    }

    public function testGetDetails() {

        $this->assertSuccessGetDetails('v1', 'orders', Order::getRandumUUID());
        $this->assertBadRequestGetDetails('v1', 'orders');
        $this->assertNotFoundGetDetails('v1', 'orders', Uuid::generate(4)->string);
    }

}
