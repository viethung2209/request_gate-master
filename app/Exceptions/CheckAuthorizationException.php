<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class CheckAuthorizationException extends AbstractException
{
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.403');
        }

        if (!$code) {
            $code = Response::HTTP_FORBIDDEN;
        }
        parent::__construct($message, $code);
    }
}
