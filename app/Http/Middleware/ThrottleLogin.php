<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use RuntimeException;
use Illuminate\Routing\Middleware\ThrottleRequests;
use App\Exceptions\LoginLimitException;

class ThrottleLogin extends ThrottleRequests
{
    protected const MAX_ATTEMPTS = 3;
    protected const DELAY_MINUTES = 1;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param int $maxAttempts
     * @param int $decayMinutes
     * @return mixed
     * @throws LoginLimitException
     */
    public function handle(
        Request $request,
        Closure $next,
        $maxAttempts = self::MAX_ATTEMPTS,
        $decayMinutes = self::DELAY_MINUTES
    ) {
        $key = $this->resolveRequestSignature($request);
        $maxAttempts = $this->resolveMaxAttempts($request, $maxAttempts);
        if ($this->limiter->tooManyAttempts($key, $maxAttempts)) {
            throw new LoginLimitException(trans('exception.429'), 429);
        }
        $this->limiter->hit($key, $decayMinutes * 60);
        $response = $next($request);
        return $this->addHeaders(
            $response,
            $maxAttempts,
            $this->calculateRemainingAttempts($key, $maxAttempts)
        );
    }

    /**
     * Resolve request signature.
     *
     * @param Request $request
     * @return string
     *
     * @throws RuntimeException
     */
    protected function resolveRequestSignature(Request $request): string
    {
        if ($route = $request->route()) {
            return sha1($request->email . '|' . $request->ip());
        }

        throw new RuntimeException(trans('exception.signature_fail'));
    }
}
