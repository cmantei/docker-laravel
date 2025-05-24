<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Coche;

class CheckPropietario
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $coche = $request->route('coche');

        if (!$coche instanceof Coche) {
            return $next($request);
        }

        if ($coche->user_id !== $request->user()->id) {
            abort(403, 'No tienes permiso para acceder al recurso.');
        }

        return $next($request);
    }
}
