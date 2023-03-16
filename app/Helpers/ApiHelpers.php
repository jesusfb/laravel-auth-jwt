<?php 

namespace App\Helpers;

class ApiHelpers {
    protected static $response = [
        'status' => null,
        'message' => null,
        'data' => null,
    ];

    public static function resApi($status = null, $message = null, $data = null) {
        self::$response['status'] = $status;
        self::$response['message'] = $message;
        self::$response['data'] = $data;

        return response()->json(self::$response, self::$response['status']);
    }
}