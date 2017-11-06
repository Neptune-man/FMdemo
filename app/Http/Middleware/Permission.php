<?php

namespace App\Http\Middleware;

use Closure;
use Larafm;

class Permission
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
        $user=Larafm::Auth()->user();
        if($user->権限!="管理者"){
          return redirect('./home');
        }
        return $next($request);
    }
}
