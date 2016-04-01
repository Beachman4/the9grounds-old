<?php

namespace App\Http\Middleware;

use Closure;
use App\Users;

class UserMiddleware
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
        if (session()->has('user_id')) {
            if (Users::find(session()->get('user_id'))) {
                return $next($request);
            }
            session()->forget('user_id');
            return redirect('/login');
        }
        return redirect('/login');
    }
}
