<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\CategoryService;
use Illuminate\Support\Facades\Log;

class CheckCategoriesLog
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $service = new CategoryService();
        $categories = $service->getAll();

        if(count($categories)<2){
            $this->logForbidden($request,'Nedovoljan broj kategorija: '.count($categories));
            return response('Mora postojati barem 2 kategorije',403);
        }

        $totalPopularity=0;

        foreach($categories as $category){
            if($category->popularity < 5){
                $this->logForbidden($request,'Kategorija "'.$category->name.'" ima popularity '.$category->popularity);
                return response('Kategorija "'.$category->name.'" nema dovoljnu popularnost',403);
            }
            $totalPopularity+=$category->popularity;
        }

        if($totalPopularity<19){
            $this->logForbidden($request,'Ukupan popularity = '.$totalPopularity);
            return response('Ukupan popularity kategorija mora biti barem 19',403);
        }
        $response = $next($request);
        $response->headers->set('X-Categories-Validations-OK','true');
        return $response;
    }

    private function logForbidden(Request $request, string $reason): void{
        Log::warning('403 Forbidden',[
            'route'=>$request->path(),
            'reason'=>$reason,
            'ip'=>$request->ip(),
            'url'=>$request->url(),
            'route-name' => $request->route()?->getName()
        ]);
    }
}
