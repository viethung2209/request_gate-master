<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class ServerException extends AbstractException
{
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.server_error');
        }

        if (!$code) {
            $code = Response::HTTP_INTERNAL_SERVER_ERROR;
        }
        parent::__construct($message, $code);
    }
}
