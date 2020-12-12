<?php

namespace App\Http\Middleware;

use App\Traits\ErrorFormatResponse;
use Closure;
use Illuminate\Http\Request;

class JWTTokenRefresh
{

    use ErrorFormatResponse;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if ($token = $this->auth) {
            # code...
        }

        return $next($request);
    }
}
