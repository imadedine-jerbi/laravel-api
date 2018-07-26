<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\ApiController;
use App\Model\Invoice;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class InvoiceApiController extends ApiController {

    public function __construct() {

        $this->modelClass = Invoice::class;
    }
}
