<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AbstractController;
use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class ApiController extends AbstractController
{
    protected $guard = 'api';

    public function __construct()
    {
        parent::__construct();
    }
    /**
     * @param array $data
     * @param string $message
     * @param int $code
     * @return JsonResponse
     */
    public function renderJson($data = [], $message = 'success', $code = Response::HTTP_OK): JsonResponse
    {
        $data['message'] = $message;
        return response()->json($data, $code);
    }
}
