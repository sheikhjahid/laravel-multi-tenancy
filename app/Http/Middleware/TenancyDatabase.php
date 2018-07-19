<?php

namespace App\Http\Middleware;

use Closure;
use Config;

class TenancyDatabase
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
        Config::set('database.connections.tenant.database',$request->database);
        return $next($request);
    }
}
