<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class AdminRoleMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Verifica si el usuario tiene el rol de administrador
        if ($request->user() && $request->user()->hasRole('Admin')) {
            return $next($request);
        }

        // Si el usuario no tiene el rol adecuado, lanza una excepción de "No autorizado"
        throw UnauthorizedException::forRoles(['Admin']);
    }
}
