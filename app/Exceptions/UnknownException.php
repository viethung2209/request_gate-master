<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class UnknownException extends AbstractException
{
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.bad_request');
        }
        if (!$code) {
            $code = Response::HTTP_BAD_REQUEST;
        }
        parent::__construct($message, $code);
    }
}
