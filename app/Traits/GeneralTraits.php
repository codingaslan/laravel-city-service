<?php

namespace App\Traits;

use App\Enums\ResponseCodeEnum;
use App\Enums\ResponseMessageEnum;
use Illuminate\Http\JsonResponse;

trait GeneralTraits
{
    public function returnSuccess($msg = ResponseMessageEnum::success, $code = ResponseCodeEnum::OK): JsonResponse
    {
        return response()->json([
            'Success. ' => true,
            'Code' => $code,
            'Message' => $msg,
        ]);
    }

    public function returnData($key, $data, $msg = ResponseMessageEnum::create_success, $code = ResponseCodeEnum::Created): JsonResponse
    {
        return response()->json([
            'Success. ' => true,
            'Code' => $code,
            'Message' => $msg,
        ]);
    }

    public function returnError($msg = ResponseMessageEnum::general_error, $code = ResponseCodeEnum::OK): JsonResponse
    {
        return response()->json([
            'Success. ' => true,
            'Code' => $code,
            'Message' => $msg,
        ]);
    }

}
