<?php

namespace App\Model;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
interface ApiModelInterface {
    
    /**
     * 
     * @param string $uuid
     */
    public static function findByUUID($uuid);
    
}