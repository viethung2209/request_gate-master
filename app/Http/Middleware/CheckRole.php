<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @param $role
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $role)
    {
        $allowsRoles = explode('|', $role);
        $userRole = Auth::user()->role->name;


        if (in_array($userRole, $allowsRoles)) {
            return $next($request);
        }
        return response()->json([
            'code' => 403,
            'message' => trans('messages.user.unauthorizedAction')
        ], 200);
    }
}
