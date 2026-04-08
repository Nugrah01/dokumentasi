<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StorageCors
{
    public function handle(Request $request, Closure $next)
    {
        // Handle preflight OPTIONS request untuk storage
        if ($request->getMethod() === 'OPTIONS' && str_starts_with($request->path(), 'storage/')) {
            return response('', 200)
                ->header('Access-Control-Allow-Origin', '*')
                ->header('Access-Control-Allow-Methods', 'GET, OPTIONS')
                ->header('Access-Control-Allow-Headers', '*')
                ->header('Access-Control-Max-Age', '86400');
        }

        $response = $next($request);

        if (str_starts_with($request->path(), 'storage/')) {
            $response->headers->set('Access-Control-Allow-Origin', '*');
            $response->headers->set('Access-Control-Allow-Methods', 'GET, OPTIONS');
            $response->headers->set('Access-Control-Allow-Headers', '*');
        }

        return $response;
    }
}