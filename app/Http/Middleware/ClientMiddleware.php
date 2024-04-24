<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'Client') {
            return $next($request);
        }
        return response()->view('403', ['message' => 'Unauthorized'], 403);
    }
}
