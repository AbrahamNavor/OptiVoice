<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class verificarRolAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    /*public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->route('login')->withErrors('Debes iniciar sesión para acceder a esta página.');
        }

        // Verificar que se tiene acceso a la propiedad 'rol'
        dd($usuario->rol);  // Esto imprimirá el valor del rol del usuario

        // Si el rol no es 'admin', redirige
        if ($usuario->rol !== 'admin') {
            return redirect()->route('home')->withErrors('No tienes acceso a esta página');
        }

        return $next($request);
    }*/

    public function handle(Request $request, Closure $next)
    {
        return $next($request); // Permitir todas las solicitudes.
    }
}
