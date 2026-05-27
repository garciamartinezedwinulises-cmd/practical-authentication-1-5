<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check()) {
            abort(403, "Unauthorized access");
        }

        // Línea temporal de diagnóstico para cruzar los IDs de la base de datos
        

        foreach ($roles as $role) {
            if (auth()->user()->hasRole($role)){
                return $next($request);
            }
        }

        abort(403, "Unauthorized access");
    }
}