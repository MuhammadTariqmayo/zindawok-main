<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Auth;
use Carbon\Carbon;

class CheckCodeExpiration
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::guard('admin')->check())
        {
            if(Auth::guard('admin')->user()->is_auth == 1) {
                return $next($request);
            }

            return redirect('/admin/authorization');
             
        }

    }
}
