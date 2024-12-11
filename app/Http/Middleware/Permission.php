<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Validation\UnauthorizedException;
use JsonException;

class Permission
{
    /**
     * @throws JsonException
     */
    public function handle($request, Closure $next)
    {
        $permission = has_permission($request->route()->getName(), null, false);
        if ($permission === true) {
            return $next($request);
        }
        abort(401);
    }
}
