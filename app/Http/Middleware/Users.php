<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class Users
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $array = explode(',', $request->user()->access);
        $uri = "/scs/".$request->path();
        $cek = DB::table('MsSubscriberMenus')->where('target',$uri)->whereIn('id',$array)->get();
        if (count($cek) && $request->user()->active == 1) {
            return $next($request);
        }else {
            return redirect(route('unauthorized'));
        }

        //return $next($request);
    }
}
