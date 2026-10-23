<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $age = $request->query('age');
        if($age===null){
            return response('Niste poslali godine!',400);
        }
        if($age < 18){
            return response('Pristup nije dozvoljen za mlađe od 18 godina',403);
        }
        return $next($request);
    }
}
