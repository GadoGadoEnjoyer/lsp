<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

use App\Http\Middleware\checkAdmin;
use App\Http\Middleware\checkIsLoggedIn;
use App\Http\Middleware\checkIsUser;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin' => checkAdmin::class,
            'logged' => checkIsLoggedIn::class,
            'user' => checkIsUser::class
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
