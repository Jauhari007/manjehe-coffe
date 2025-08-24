<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        // Laravel 12 - built-in auth middleware sudah mendukung multi-guard
        // Tidak perlu custom middleware lagi
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
