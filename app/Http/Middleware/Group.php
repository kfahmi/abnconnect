<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Auth;

class Group
{
   public function handle($request, Closure $next, $role)
    {
         if (Auth::check() && (Auth::user()->group->name == $role)) {
            return $next($request);
        }

        abort(403);
    }
}
