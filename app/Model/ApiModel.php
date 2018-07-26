<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\Model\ApiModelInterface;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
abstract class ApiModel extends Model implements ApiModelInterface {

    public static $publicFields = array('uuid');
    public static $name;

    /**
     * 
     * @param string $uuid
     * @return array
     */
    public static function findByUUID($uuid) {

        $record = self::where('uuid', $uuid)->get();
        $publicRecord = self::getPublicResults($record);
        
        return $publicRecord;
    }

    /**
     * 
     * @return array
     */
    public static function getAll() {

        $records = self::paginate();
        $data = self::getPublicResults($records);
        $paging = self::getResultPaging($records);
        $publicRecords = array('data' => $data, 'paging' => $paging);
        
        return $publicRecords;
    }

    /**
     * 
     * @param Object $paging
     * @return string[]
     */
    private static function getResultPaging($paging) {

        $resultPaging = array(
            'total' => $paging->total(),
            'per_page' => $paging->count(),
            'current_page' => $paging->currentPage(),
            'next_page_url' => $paging->nextPageUrl(),
            'prev_page_url' => $paging->previousPageUrl()
        );

        return $resultPaging;
    }

    /**
     * 
     * @param Object $results
     * @return array
     */
    private static function getPublicResults($results) {

        $publicResults = $results->map(function ($result) {

            $publicResult = array();

            foreach (self::$publicFields as $field) {

                $publicResult[$field] = $result[$field];
            }

            return $publicResult;
        });

        return $publicResults;
    }
    

    /**
     * 
     * @return string
     */
    public static function getRandumUUID() {

        $recordUUIDs = self::all('uuid')->toArray();
        $recordUUID = reset($recordUUIDs[array_rand($recordUUIDs)]);

        return $recordUUID;
    }

    /**
     * 
     * @return string
     */
    public static function getName() {

        $name = self::$name;

        if (empty($name)) {

            $name = with(new static)->getTable();
        }

        return $name;
    }

}
