<?php
require(__DIR__ . "/../connection/connection.php");
require(__DIR__ . "/../services/ResponseService.php");

class baseController {
 
    public $mysqli;

    protected function success($data){
        return ResponseService :: success_response($data);
    }

    protected function error($message){
        return ResponseService :: error_response($message);
    }

}