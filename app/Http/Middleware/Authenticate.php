<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson() && explode('/',$request->path())[0] == "api") {
            return response()->json([
                'error' => true,
                'message' => "Anda belum login!",
            ], 400);
        } else if(! $request->expectsJson()){
            return route('login');
        }
    }
}
