<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;

class Permission
{
   public function handle($request, Closure $next, $permission)
    {
         if (Auth::check() && Auth::user()->hasPermission($permission)) {
            return $next($request);
        }

        abort(403);
    }
}
