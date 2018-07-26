<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\ApiController;
use App\Model\Order;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class OrderApiController extends ApiController
{
    
    public function __construct() {
        
        $this->modelClass = Order::class;
    }
}
