<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckMinimumAge
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, int $minAge): Response
    {
        $age = $request->query('age');
        if($age===null){
            return response('Niste poslali godine!',400);
        }

        if($age < $minAge){
            return response("Minimalna dob je {$minAge} godina",403);
        }
        return $next($request);
    }
}
