<?php

namespace App\Exceptions;

use Illuminate\Http\Response;

class CheckAuthenticationException extends AbstractException
{
    /**
     * CheckAuthenticationException constructor.
     * @param string $message
     * @param null $code
     */
    public function __construct($message = null, $code = null)
    {
        if (!$message) {
            $message = __('exception.401');
        }

        if (!$code) {
            $code = Response::HTTP_UNAUTHORIZED;
        }
        parent::__construct($message, $code);
    }
}
