<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;


class Hasrole
{
    public function handle($request, Closure $next)
    {   
        if(Auth::check()) {
            if (Auth::user()->id_role == '1') {
                return $next($request);
            }
            else {
                Auth::logout();
                return redirect('admin/login')->with('error', 'Permission denied');
            }
        }
        // abort(403);
        return redirect('admin/login')->with('error', 'Permission denied');
    }
}
