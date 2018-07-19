<?php

namespace App\Http\Middleware;

use Hyn\Tenancy\Database\Connection;
use Closure;
use Illuminate\Support\Facades\Config;

class EnforceTenancy
{
    public function handle($request, Closure $next)
    {
    
    	Config::set('database.connections.tenant.database', $request->database);
    	
        return $next($request);
    }
}