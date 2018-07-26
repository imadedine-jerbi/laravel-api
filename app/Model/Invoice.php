<?php

namespace App\Model;

use App\Model\ApiModel;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class Invoice extends ApiModel {

    /**
     * 
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {

        parent::__construct($attributes);
        $this::$name = 'Invoice';
        parent::setTable('invoice'); 
        $this::$publicFields = array('uuid', 'paid_amount', 'user_uuid', 'order_uuid');
    }

}
