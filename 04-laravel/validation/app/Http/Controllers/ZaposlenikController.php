<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreZaposlenikRequest;
use Illuminate\Http\Request;

class ZaposlenikController extends Controller
{
    public function create()
    {
        return view('validacije.zaposlenik');
    }

    public function store(StoreZaposlenikRequest $request)
    {
        $validated = $request->validated();

        return view('validacije.rezultat',[
            'podaci'=>$validated,
        ]);
    }
}
