<?php

namespace App\Http\Controllers;

use App\Enums\ResponseTypeEnum;
use Illuminate\Http\JsonResponse;

abstract class Controller
{
    public function sendJsonSuccessResponse($message = '', $result = []): JsonResponse
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
        ];
        if ($message) {
            app('request')->session()->flash(ResponseTypeEnum::SUCCESS->value, $message);
        }
        return response()->json($response);
    }


    public function sendJsonErrorResponse($message = '', $errorMessages = []): JsonResponse
    {
        $response = [
            'success' => false,
            'message' => $message,
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        if ($message) {
            app('request')->session()->flash(ResponseTypeEnum::ERROR->value, $message);
        }
        return response()->json($response);
    }
}
