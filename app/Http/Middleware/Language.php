<?php

namespace App\Http\Middleware;

use Closure;
use JsonException;

class Language
{
    /**
     * @throws JsonException
     */
    public function handle($request, Closure $next)
    {
        set_language();
        return $next($request);
    }
}
