<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsobaValidacijaController extends Controller
{
    public function create(){
        return view('validacije.osoba');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime'=> 'required|min:2|max:50|regex:/^[A-ZČĆŽŠĐ]/u',
            'prezime'=> 'required|min:2|max:50|regex:/^[A-ZČĆŽŠĐ]/u',
            'email'=> 'required|email',
            'godine'=>'required|integer|min:18|max:100',
            'placa'=>'required|numeric|min:1000',
        ]);

        return view('validacije.rezultat',[
            'podaci'=>$validated
        ]);
    }
}
