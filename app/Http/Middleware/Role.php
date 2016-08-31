<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null, $role2 = null, $role3 = null, $role4 = null)
    {
        if ( \Auth::user()->role_id == $role || \Auth::user()->role_id == $role2 || \Auth::user()->role_id == $role3 || \Auth::user()->role_id == $role4  ) {
            return $next($request);
        }
        return redirect()->back()->with('danger', 'Anda tidak memiliki hak akses ke halaman tersebut');
    }
}
