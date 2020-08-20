<?php

namespace App\Traits;

trait ApiResponseTrait{

    public $paginateNumber = 10;

    /* response figure
     *
     *[
     *'data' =>
     *'status' => true, false
     *'error' => ''
     *]
     * */

    public function apiResponse($data = null, $error = null, $code = 200){

        $array = $data;
        //We removed the status and error keys to be compatible with the test case
            //[
//            'data' => $data,
//            'status' => in_array($code, $this->successCode())  ? true : false,
//            'error' => $error
//        ];
        return response($array, $code);

    }

    public function successCode(){

        return [
          200,201,202
        ];
    }



    public function createResponse($data){

        return $this->apiResponse($data, null, 201);

    }


    public function unauthorizedResponse($textError){
        return $this->apiResponse(null, $textError, 401);
    }




    public function deleteResponse(){

        return $this->apiResponse(true, null, 200);


    }



    public function notFoundResponse($textError){

        return $this->apiResponse(null,$textError,404);

    }



    public function unKnowError($textError){
        return $this->apiResponse(null, $textError, 400);
    }



    public function apiValidation($request, $array){

        $validate = \Validator::make($request->all(), $array);

        if($validate->fails()){
            return $this->apiResponse(null,$validate->errors(),422);
        }

    }

}
