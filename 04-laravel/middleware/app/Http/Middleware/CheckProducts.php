<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Services\ProductService;
use Illuminate\Support\Facades\Log;

class CheckProducts
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         $service = new ProductService();

        $products = $service->getAllProducts();

        if (count($products) < 4) {

            $this->logForbidden(
                $request,
                'Lista proizvoda ima manje od 4 proizvoda.'
            );

            return response(
                'Mora postojati barem 4 proizvoda.',
                403
            );
        }

        $hasProductStartingWithB = false;

        foreach ($products as $product) {

            if (str_starts_with(
                strtolower($product->name),
                'b'
            )) {
                $hasProductStartingWithB = true;
                break;
            }
        }

        if (!$hasProductStartingWithB) {

            $this->logForbidden(
                $request,
                'Nijedan proizvod ne počinje slovom B.'
            );

            return response(
                'Barem jedan proizvod mora počinjati slovom B.',
                403
            );
        }

        $totalPrice = 0;

        foreach ($products as $product) {
            $totalPrice += $product->price;
        }

        if ($totalPrice < 40 || $totalPrice > 70) {

            $this->logForbidden(
                $request,
                'Ukupna cijena proizvoda iznosi ' . $totalPrice
            );

            return response(
                'Ukupna cijena proizvoda mora biti između 40 i 70.',
                403
            );
        }

        $response = $next($request);

        $response->headers->set(
            'X-Products-Validated',
            'OK'
        );

        return $response;
    }

     private function logForbidden(
        Request $request,
        string $reason
    ): void {

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
