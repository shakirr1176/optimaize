<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class VerificationPermission
{
    public function handle($request, Closure $next)
    {
        if (
            (Auth::guest() || (!Auth::user()->email_verified_at)) &&
            settings('require_email_verification')
        ) {
            return $next($request);
        }

        abort(419);
    }
}
