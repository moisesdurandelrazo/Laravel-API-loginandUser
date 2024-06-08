<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\Cors;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->append(Cors::class);
        $middleware->validateCsrfTokens(except: [
        'http://localhost:8000/v1/estudiantes',
        'http://localhost:8000/v1/estudiantes/*',
        'http://localhost:8000/v1/usuarios',
        'http://localhost:8000/v1/usuarios/*',
        'http://localhost:8000/register',
        'http://localhost:8000/login',
        'http://localhost:8000/logout',
        'http://localhost:8080/*',
        'http://localhost:8080',
        'http://localhost:8080/register',
        'http://localhost:8080/login',
        'http://localhost:8080/logout'
    ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();