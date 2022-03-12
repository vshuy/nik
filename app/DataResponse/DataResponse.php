<?php

namespace App\DataResponse;

class DataResponse
{
    public static $SUCCESS_CREATE_PRODUCT = 'Create product success';
    public static $SUCCESS_GET_PRODUCT = 'Get products success';
    public static $ERROR_CREATE_PRODUCT = 'Error create product';
    public static $SUCCESS_UPDATE_PRODUCT = 'Update product success';
    public static $ERROR_UPDATE_PRODUCT = 'Error update product';
    public static function response($message, $status, $data)
    {
        $result = collect([
            'message' => $message,
            'status' => $status,
            'data' => $data,
        ]);
        return Response()->json($result);
    }
}
