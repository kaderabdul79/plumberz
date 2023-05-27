<?php

namespace App\Helpers;

class ResponseHelper
{
    public static function successResponse($message, $data = null)
    {
        return [
            'status' => true,
            'message' => $message,
            'data' => $data,
        ];
    }

    public static function errorResponse($message, $statusCode, $data = null)
    {
        return [
            'status' => false,
            'message' => $message,
            'data' => $data,
            'statusCode' => $statusCode,
        ];
    }
}