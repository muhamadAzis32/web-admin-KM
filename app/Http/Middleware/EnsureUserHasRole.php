<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserHasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {

        if ($request->user()->role == $role) {
            // dd($request->)
            return $next($request);
        }

        abort(403, "Anda tidak memiliki akses");
    }
}
