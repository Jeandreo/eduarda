<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Verifique se o usuário está autenticado e é um administrador
        if (Auth::check() && Auth::user()->admin == 1) {
            return $next($request);
        }

        // Caso contrário, redirecione para uma página de erro ou acesso negado
        return redirect()->route('dashboard')->with('message', 'Você não tem permissão para acessar esta página.');
    }
}
