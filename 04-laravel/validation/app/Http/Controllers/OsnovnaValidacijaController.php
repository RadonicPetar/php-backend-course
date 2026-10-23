<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OsnovnaValidacijaController extends Controller
{
    public function create(){
        return view('validacije.osnovna');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'ime' => 'required|min:2',
        ]);

        return view('validacije.rezultat',[
            'podaci'=>$validated
        ]);
    }
}
