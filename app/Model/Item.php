<?php

namespace App\Model;

use App\Model\ApiModel;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class Item extends ApiModel{

    /**
     * 
     * @param array $attributes
     */
    public function __construct(array $attributes = array()) {
        
        parent::__construct($attributes);
        $this::$name = 'Item';
        $this::$publicFields = array('uuid', 'name', 'price');
    }

}
