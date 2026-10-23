<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreZaposlenikRequest;

class LijecnikController extends Controller
{
    public function create()
    {
        return view('validacije.lijecnik');
    }

    public function store(StoreZaposlenikRequest $request)
    {
        $validated = $request->validated();

        return view('validacije.rezultat',[
            'tip_validacije'=>'lijecnik',
            'podaci'=>$validated,
        ]);
    }
}
