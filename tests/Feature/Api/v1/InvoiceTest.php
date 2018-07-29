<?php

namespace Tests\Feature\Api\v1;

use Tests\Feature\Api\ApiModel;
use App\Model\Invoice;
use Webpatser\Uuid\Uuid;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class InvoiceTest extends ApiModel {

    public function testGetAll() {

        $this->assertSuccessGetAll('v1', 'invoices?page=1');
        $this->assertSuccessGetAll('v1', 'invoices');
    }

    public function testGetDetails() {

        $this->assertSuccessGetDetails('v1', 'invoices', Invoice::getRandumUUID());
        $this->assertBadRequestGetDetails('v1', 'invoices');
        $this->assertNotFoundGetDetails('v1', 'invoices', Uuid::generate(4)->string);
    }

    public function testDelete() {

        $item = factory(Invoice::class)->create();
        $this->assertSuccessDelete('v1', 'invoices', $item->uuid);
        $this->assertBadRequestDelete('v1', 'invoices');
        $this->assertNotFoundDelete('v1', 'invoices', Uuid::generate(4)->string);
    }

}
