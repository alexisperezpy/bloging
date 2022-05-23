<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Cors
{
    
    public function handle(Request $request, Closure $next)
    {
        $request->header('Access-Control-Allow-Origin', '*');
        $request->header('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
        $request->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
        return $next($request);
    }
}
