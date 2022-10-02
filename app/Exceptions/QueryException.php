<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class QueryException extends AbstractException
{
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.query_error');
        }

        if (!$code) {
            $code = Response::HTTP_BAD_REQUEST;
        }
        parent::__construct($message, $code);
    }
}
