<?php

namespace App\Http\Middleware;

use Closure;
use App\Helpers\ApiResponse;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!$request->user() || $request->user()->role !== 'admin') {
            return ApiResponse::error('Forbidden', 403);
        }

        return $next($request);
    }
}