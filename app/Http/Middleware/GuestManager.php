<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class GuestManager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role, $who = 'abitur')
    {
        if(!Auth::check() || $request->user()->hasRole($role)){
            return $next($request);
        }

        if ($who == 'abitur') {
            return redirect(route('abiturcab'));
        } elseif($who == 'admin'){
            return redirect('/admin');
        }
    }
}
