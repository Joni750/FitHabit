<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Suscription;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::check()) {

            $userSuscription = Suscription::where('user_id', auth()->id())->first();

            if ($userSuscription && $userSuscription->suscriptionType->name === 'gratuita') {

                return redirect()->route('inicio')->with('error', 'No tienes acceso a esta sección.');

            }

        }

        return $next($request);

    }
}
