<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificar si el usuario está autenticado y es administrador
        if (Auth::check() && Auth::user()->is_admin) {
            return $next($request); // Permitir acceso
        }

        // Redirigir al login de admin si no tiene permisos
        return redirect()->route('admin.login')->withErrors([
            'error' => 'Debes iniciar sesión como administrador.',
        ]);
    }
}
