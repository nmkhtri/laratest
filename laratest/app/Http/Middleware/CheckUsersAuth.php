<?php

namespace App\Http\Middleware;

use Closure;

class CheckUsersAuth
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

        if($request->level == 'developer' or 'operator' or 'user')
        {
                return $next($request);
        }
        return redirect('/');
    }
}
