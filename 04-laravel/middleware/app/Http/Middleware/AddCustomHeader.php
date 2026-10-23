<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddCustomHeader
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        // $response->headers->set('X-Course','Laravel Middleware');
        // $response->headers->set('X-Author','Milan Krivić');
        // $response->headers->set('X-Version','1.0');
        $response->headers->add([
            'X-Course'=>'Laravel Middleware',   
            'X-Author'=>'Milan Krivic',   
            'X-Version'=>'1.0'
        ]);
        return $response;
    }
}
