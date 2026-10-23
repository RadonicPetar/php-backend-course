<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SimpleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo "<h3>Prije rute - middleware ide dalje</h3>";
        $response = $next($request);
        echo "<h3>Nakon rute - middleware ide dalje</h3>";
        logger('SimpleMiddleware se izvršio');
        return $response;
    }
}
