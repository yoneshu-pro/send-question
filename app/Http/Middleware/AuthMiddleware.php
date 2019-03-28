<?php

namespace App\Http\Middleware;

use App\Services\Auth;
use Closure;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::checkLogin() === false) {
            return redirect('/')->withErrors(['errorMessage' => '再度ログインしてください。']);
        }
        return $next($request);
    }
}
