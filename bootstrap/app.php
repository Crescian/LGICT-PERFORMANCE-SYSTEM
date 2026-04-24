<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php', // ✅ ADD THIS
        commands: __DIR__ . '/../routes/console.php',
    )
    ->withMiddleware(function ($middleware) {
        $middleware->alias([
            'check.sso' => \App\Http\Middleware\CheckSSOLogin::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
