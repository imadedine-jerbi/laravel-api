<?php

namespace Tests\Feature\Api\v1;

use Tests\Feature\Api\ApiModel;
use App\Model\Item;
use Webpatser\Uuid\Uuid;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class ItemTest extends ApiModel {

    public function testGetAll() {

        $this->assertSuccessGetAll('v1', 'items?page=1');
        $this->assertSuccessGetAll('v1', 'items');
    }

    public function testGetDetails() {

        $this->assertSuccessGetDetails('v1', 'items', Item::getRandumUUID());
        $this->assertBadRequestGetDetails('v1', 'items');
        $this->assertNotFoundGetDetails('v1', 'items', Uuid::generate(4)->string);
    }

}
