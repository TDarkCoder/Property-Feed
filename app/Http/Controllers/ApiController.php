<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class ApiController extends Controller
{
    public const PAGE = 1;
    public const LIMIT = 10;

    public function response(mixed $data, int $code = 200): JsonResponse
    {
        return response()->json($data, $code);
    }
}
