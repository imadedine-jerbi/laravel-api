<?php

namespace Tests\Feature\Api;

use Tests\TestCase;
use PHPUnit\Framework\Assert as PHPUnit;

/**
 * 
 * @author Imadedine Jerbi <contact@imadedinejerbi.com>
 * 
 */
class ApiModel extends TestCase {

    /**
     * 
     * @param string $apiVersion
     * @param string $modelRouteName
     */
    public function assertSuccessGetAll($apiVersion, $modelRouteName) {

        $response = $this->get('/api/' . $apiVersion . '/' . $modelRouteName);
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertSuccesssStatus($responseData, true);
        $this->assertResponseWithDataAndPaging($responseData);
    }

    /**
     * 
     * @param string $apiVersion
     * @param string $modelRouteName
     * @param string $UUID
     */
    public function assertSuccessGetDetails($apiVersion, $modelRouteName, $UUID) {

        $response = $this->get('/api/' . $apiVersion . '/' . $modelRouteName . '/' . $UUID);
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertSuccesssStatus($responseData, true);
        $this->assertResponseWithData($responseData);
    }

    /**
     * 
     * @param string $apiVersion
     * @param string $modelRouteName
     * @param string $UUID
     */
    public function assertBadRequestGetDetails($apiVersion, $modelRouteName, $UUID = 'XXX') {

        $response = $this->get('/api/' . $apiVersion . '/' . $modelRouteName . '/' . $UUID);
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertBadRequest($responseData);
    }

    /**
     * 
     * @param string $apiVersion
     * @param string $modelRouteName
     * @param string $UUID
     */
    public function assertNotFoundGetDetails($apiVersion, $modelRouteName, $UUID = 'XXX') {

        $response = $this->get('/api/' . $apiVersion . '/' . $modelRouteName . '/' . $UUID);
        $response->assertStatus(200);
        $responseData = $response->json();
        $this->assertNotFound($responseData);
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertNotFound($responseData) {

        $this->assertErrorMessage($responseData);
        $this->assertSuccesssStatus($responseData, false);
        $this->assertErrorCodeInRange($responseData, 404000, 404999);
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertBadRequest($responseData) {

        $this->assertErrorMessage($responseData);
        $this->assertSuccesssStatus($responseData, false);
        $this->assertErrorCodeInRange($responseData, 400000, 400999);
    }

    /**
     * 
     * @param array $responseData
     * @param int $rangeStart
     * @param int $rangeEnd
     */
    public function assertErrorCodeInRange($responseData, $rangeStart, $rangeEnd) {

        $existErrorCode = isset($responseData['error']) ? true : false;

        if ($existErrorCode) {

            $errorCode = $responseData['error'];
            $validCodeError = ($errorCode >= $rangeStart && $errorCode <= $rangeEnd) ? true : false;
            PHPUnit::assertTrue(
                    $validCodeError, "Expected error code to be between $rangeStart and $rangeEnd but get $errorCode."
            );
        } else {

            PHPUnit::assertTrue(
                    false, "Expected error code to be in response data."
            );
        }
    }

    /**
     * 
     * @param string $responseData
     * @param boolean $status
     */
    public function assertSuccesssStatus($responseData, $status) {

        $existStatus = isset($responseData['success']) ? true : false;

        if ($existStatus) {

            PHPUnit::assertTrue(
                    $status === $responseData['success'], "Expected success to be $status."
            );
        } else {

            PHPUnit::assertTrue(
                    false, "Expected success in response data."
            );
        }
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertErrorMessage($responseData) {

        $message = isset($responseData['message']) ? $responseData['message'] : '';

        PHPUnit::assertFalse(
                empty($message), "Expected error message."
        );
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertResponseWithDataAndPaging($responseData) {

        $this->assertResponseWithData($responseData);
        $this->assertResponseWithPaging($responseData);
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertResponseWithPaging($responseData) {

        $paging = isset($responseData['paging']) ? true : false;

        PHPUnit::assertTrue(
                $paging, "Expected paging to be true."
        );
    }

    /**
     * 
     * @param array $responseData
     */
    public function assertResponseWithData($responseData) {

        PHPUnit::assertTrue(
                isset($responseData['data']), "Expected data in response."
        );
    }

}
