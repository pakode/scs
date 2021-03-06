<?php

namespace App\Http\Middleware;

use Closure;

class Administrator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if ($request->user()->role == 0 && $request->user()->active == 1 ) {
            return $next($request);
        }else {
            return redirect(route('unauthorized'));
        }
    }
}
