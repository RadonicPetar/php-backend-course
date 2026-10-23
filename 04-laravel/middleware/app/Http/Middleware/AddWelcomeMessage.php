<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AddWelcomeMessage
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->query('user','Gost');
        $rola = $request->query('rola','Korisnik');

        $request->merge([
            'welcome_message' => "Dobrodošao, {$user}, vi ste {$rola}!"
        ]);
        return $next($request);
    }
}
