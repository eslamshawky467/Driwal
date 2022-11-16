<?php
use Illuminate\Support\Facades\Auth;


if(!function_exists('apiResponse')){
    function apiResponse($message,$data = [],$status = 200){
        return response()->json([
            'message' => $message,
            'data' => $data
        ],$status);
    }
}
