<?php
namespace App\Http\Middleware;
use Closure;
use Larafm;

class LoginAuth
{
    public function handle($request, Closure $next)
    {
         if(!Larafm::Auth()->user()){
           return redirect('./login');
         }
        return $next($request);
    }
}
