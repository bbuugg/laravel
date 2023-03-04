<?php

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

if (!function_exists('success')) {
    function success($data, $message = 'Success', $code = 0, $status = 200): JsonResponse
    {
        return Response::json([
            'status'  => true,
            'data'    => $data,
            'message' => $message,
            'code'    => $code,
        ], $status);
    }
}
