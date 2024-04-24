<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ServiceMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'Service Desk') {
            return $next($request);
        }
        return response()->view('403', ['message' => 'Unauthorized'], 403);
    }
}
