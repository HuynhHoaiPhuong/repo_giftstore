<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Hasrole
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
        if(Auth::check()) {
            if (Auth::user()->id_role != '1') {
                Auth::logout();
                return redirect('admin/login')->with('error', 'Permission denied');
            }
            else
                return $next($request);
        }
        return redirect('admin/login')->with('error', 'Permission denied');
    }
}
