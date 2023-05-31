<?php

namespace App\Http\Middleware;

use App\Http\Controllers\Backend\AdminController;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\Response;

class AdminLogueado
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, int $necesitaLogin = 0): Response
    {
        if($necesitaLogin) {
            if(Auth::check()) {
                return $next($request);
            }

            return Redirect::action([AdminController::class, 'login']);
        }

        // Si el usuario no necesita loguearse
        if(!Auth::check()) {
            return $next($request);
        }

        return Redirect::action([AdminController::class, 'home']);

    }
}
