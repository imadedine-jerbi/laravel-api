<?php

namespace App\Model;

use App\Model\ApiModel;
use Illuminate\Support\Facades\Redis;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
abstract class ApiRedisModel extends ApiModel{

    /**
     * 
     * @param string $uuid
     * @return array
     */
    public static function findByUUID($uuid) {
        
        $publicRecord = Redis::get($uuid);

        if (empty($publicRecord)) {
            
            $publicRecord = parent::findByUUID($uuid);
            Redis::set($uuid, $publicRecord);
        }else{
            
            $publicRecord = json_decode($publicRecord);
        }
        
        return $publicRecord;
    }
    
    /**
     * 
     * @return array
     */
    public static function getAll($pageID = 1){
        
        $redisKey = self::getName() . '-all-' . $pageID;
        $publicRecords = Redis::get($redisKey);

        if (empty($publicRecords)) {
            
            $publicRecords = parent::getAll();
            Redis::set($redisKey, $publicRecords);
        }else{
            
            $publicRecord = json_decode($publicRecord);
        }
        
        return $publicRecords;
    }

}
