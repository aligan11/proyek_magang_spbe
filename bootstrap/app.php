<?php

use App\Http\Middleware\AuthenticatePemohon;
use App\Http\Middleware\CheckPetugas;
use App\Http\Middleware\CheckRole;
use App\Http\Middleware\UpdateLastseen;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        //a
        $middleware->alias([
            'check.role' => CheckRole::class,
            'check.pemohon' => AuthenticatePemohon::class,
            'petugas.online' => UpdateLastseen::class,

        ]);
    })
    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
