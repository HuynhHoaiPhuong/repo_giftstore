<?php

namespace App\Http;

use Illuminate\Http\Request;

class Payload{
    public static function toJson($data,$message,$status){
        return [
            'data'=>$data,
            'message'=>$message,
            'status' =>$status,
        ];
    }
}