<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckEmptyRoute
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        if (empty($response->content()) || str_contains($response->content(), 'mensaje-de-error')) {
            return redirect('/home')->with('mensaje-error', 'Por problemas técnicos, no se puede mostrar la página en este momento.');
        }

        return $response;
    }
}
