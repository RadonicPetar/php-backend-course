<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class LogClientIp
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        Log::info('Posjet stranici',
        [
            'ip'=>$request->ip(),
            'vrijeme'=>Carbon::now()->format('d.m.Y H:i:s.u')
        ]);

        return $next($request);
    }
}
