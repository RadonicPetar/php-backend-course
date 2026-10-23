<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\VozilaService;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
class CheckVozila
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $automobili = VozilaService::dohvatiAutomobile();
        $vlasnici = VozilaService::dohvatiVlasnike();

        foreach($automobili as $automobil){
            if(str_starts_with($automobil['registracija'],'DA')){
                $this->logForbidden($request,'Registracija problem: počinje sa DA: '.$automobil['registracija']);
                return response('Prikaz je blokiran jer jedan automobil ima registraciju iz Daruvara.',403);
            }

            $vlasnik = VozilaService::dohvatiVlasnikaPoid($automobil['vlasnikid'],$vlasnici);
            if($vlasnik === null){
                $this->logForbidden($request,'Vlasnik nije pronađen za automobil ID: '.$automobil['id']);
                return response('Prikaz je blokiran jer vlasnik nije pronađen',403);
            }

            $datumRodjena = Carbon::parse($vlasnik['datum_rod']);
            $godine = $datumRodjena->age;

            if($godine < 18){
                $this->logForbidden($request,'Vlasnik '.$vlasnik['ime'].' '.$vlasnik['prezime'].' je maloljetan');
                return response('Prikaz je blokiran jer je vlansik automobila maloljetan',403);
            }     
        }

        $response = $next($request);
        $response->headers->set('X-Vozila-Checked','OK');
        return $response;
    }

    private function logForbidden(Request $request, string $reason): void
    {
        Log::warning('Products middleware forbidden', [
            'route' => $request->path(),
            'url' => $request->url(),
            'method' => $request->method(),
            'ip' => $request->ip(),
            'reason' => $reason,
            'time' => now(),
        ]);
    }
}
