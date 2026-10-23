<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;

class LogAfterRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Middleware handle: prije rute',[
            'url'=>$request->url(),
            'method'=>$request->method(),
        ]);
        return $next($request);
    }

    public function terminate(Request $request, Response $response): void{
        Log::info('Middleware handle: nakon response-a',[
            'url'=>$request->url(),
            'method'=>$request->method(),
        ]);
    }
}
