<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class UnprocessableEntityException extends AbstractException
{
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.422');
        }
        if (!$code) {
            $code = Response::HTTP_UNPROCESSABLE_ENTITY;
        }
        parent::__construct($message, $code);
    }
}
