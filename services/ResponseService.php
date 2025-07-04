<?php

class ResponseService {

    public function success_response($payload){
        $response = [];
        $response["status"] = 200;
        $response["payload"] = $payload;
        return json_encode($response);
    }

    public function error_response($message){
        $response = [];
        $response["status"] = 500;
        $response["message"] = $message;
        return json_encode($response);
    }

}