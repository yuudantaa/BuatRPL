<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Periksa apakah user memiliki salah satu role yang sesuai
        if (!in_array($request->user()->role, $roles)) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        return $next($request);
    }
}
