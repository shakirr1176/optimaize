<?php

use App\Http\Middleware\Language;
use App\Http\Middleware\Permission;
use Illuminate\Foundation\Application;
use App\Http\Middleware\VerificationPermission;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->web([
            Language::class,
        ]);
        $middleware->alias([
            'permission' => Permission::class,
            'verification.permission' => VerificationPermission::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
