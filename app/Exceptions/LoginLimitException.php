<?php

namespace App\Exceptions;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;

class LoginLimitException extends AbstractException
{
    protected $code;
    protected $message;

    /**
     * AbstractException constructor.
     * @param null $message
     * @param int $code
     */
    public function __construct($message = null, $code = Response::HTTP_OK)
    {
        $this->code = $code;
        $this->message = $message ?: trans('exception.server_error');

    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function render(Request $request): JsonResponse
    {
        return response()->json([
            'code' => $this->code,
            'message' => $this->message,
        ], Response::HTTP_OK);
    }

    /**
     * Log an exception.
     */
    public function report()
    {
        Log::emergency($this->message);
    }
}
