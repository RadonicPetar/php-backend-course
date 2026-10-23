<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProizvodController extends Controller
{
    public function create()
    {
        return view('validacije.proizvod');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'sifra'=>'required|integer|min:100|max:500',
            'naziv'=>'required|min:2|max:100',
            'kolicina'=>'required|integer|min:0|max:50',
            'cijena'=>'required|numeric|min:0|max:1000',
        ]);

        return view('validacije.proizvod-show',[
            'podaci'=>$validated,
        ]);
    }
}
