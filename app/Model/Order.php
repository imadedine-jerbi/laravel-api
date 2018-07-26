<?php

namespace App\Model;

use App\Model\ApiModel;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class Order extends ApiModel {

    /**
     * 
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {

        parent::__construct($attributes);
        $this::$name = 'Order';
        $this::$publicFields = array('uuid', 'user_uuid', 'item_uuid');
    }

}
