<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckApiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->query('api_key')!=='12345'){
            return response()->json([
                'status'=>'error',
                'message'=>'Invalid API key'
            ],401);
        }
        return $next($request);
    }
}
