<?php

namespace App\Admin\Controllers;

use App\Http\Controllers\ApiController;
use App\Model\Item;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class ItemApiController extends ApiController {

    public function __construct() {
        
        $this->modelClass = Item::class;
    }

}
