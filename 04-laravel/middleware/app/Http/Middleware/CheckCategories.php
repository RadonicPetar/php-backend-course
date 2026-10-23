<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\CategoryService;
class CheckCategories
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
            return response('Mora postojati barem 2 kategorije',403);
        }

        $totalPopularity=0;

        foreach($categories as $category){
            if($category->popularity < 5){
                return response('Kategorija "'.$category->name.'" nema dovoljnu popularnost',403);
            }
            $totalPopularity+=$category->popularity;
        }

        if($totalPopularity<19){
            return response('Ukupan popularity kategorija mora biti barem 19',403);
        }
        return $next($request);
    }
}
