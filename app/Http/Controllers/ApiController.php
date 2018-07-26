<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Webpatser\Uuid\Uuid;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
abstract class ApiController extends BaseController {

    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    public $modelClass = null;

    /**
     * 
     * @return Json
     */
    public function all() {

        $results = $this->modelClass::getAll();
        
        return $this->results($results['data'], $results['paging']);
    }
    
    /**
     * 
     * @param string $uuid
     * @return Json
     */
    public function details($uuid) {

        if(Uuid::validate($uuid) == false){
            
            return $this->badRequest();
        }
        
        $data = $this->modelClass::findByUUID($uuid);
        
        if (sizeof($data) > 0) {
            
            return $this->results($data);
        } else {

            return $this->notFound($uuid);
        }
    }

    /**
     * 
     * @param type $uuid
     * @return type
     */
    public function update($uuid) {

        if(Uuid::validate($uuid) == false){
            
            return $this->badRequest();
        }
        
        $data = $this->modelClass::findByUUID($uuid);

        if (sizeof($data) > 0) {
            
            //update
        } else {

            return $this->notFound($uuid);
        }
    }

    /**
     * 
     */
    public function create() {
        
        
    }

    /**
     * 
     * @param string $uuid
     * @return Json
     */
    public function delete($uuid) {

        if(Uuid::validate($uuid) == false){
            
            return $this->badRequest();
        }
        
        $data = $this->modelClass::findByUUID($uuid);

        if (sizeof($data) > 0) {
            
            //dalete
        } else {

            return $this->notFound($uuid);
        }
    }

    /**
     * 
     * @param array $data
     * @param string[] $paging
     * @return Json
     */
    public function results($data, $paging = array()) {

        $result = array('success' => true, 'data' => $data);

        if (!empty($paging)) {

            $result['paging'] = $paging;
        }
        
        return response()->json($result);
    }

    /**
     * 
     * @return Json
     */
    public function notFound() {

        $result = array('success' => false, 'error' => 404001, 'message' => $this->modelClass::getName() . ' not found');

        return response()->json($result);
    }

    /**
     * 
     * @return Json
     */
    public function badRequest() {

        $result = array('success' => false, 'error' => 400001, 'message' => 'The given uuid is invalid');

        return response()->json($result);
    }

}
