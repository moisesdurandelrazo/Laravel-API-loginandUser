<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'http://localhost:8080/v1/estudiantes/*', // Excluir todas las rutas de estudiantes de la validación CSRF
        // Añade aquí otras rutas de la API si es necesario
    ];
}