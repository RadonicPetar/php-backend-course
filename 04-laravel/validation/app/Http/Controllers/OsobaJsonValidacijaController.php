<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OsobaJsonValidacijaController extends Controller
{
    public function create()
    {
        return view('validacije.osoba-json');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'ime'=>'required|min:2|max:50',
            'prezime'=>'required|min:2|max:50',
            'placa'=>'required|numeric|min:1000'
        ]);

        $osoba = [
            'id'=>Str::uuid()->toString(),
            'ime'=>$validated['ime'],
            'prezime'=>$validated['prezime'],
            'placa'=>(float)$validated['placa'],
        ];

        $putanja = storage_path('app/osobe_validirane.json');

        $osobe = [];

        if(file_exists($putanja)){
            $osobe = json_decode(file_get_contents($putanja),true) ?? [];
        }

        $osobe[]=$osoba;

        file_put_contents($putanja,json_encode($osobe,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return view('validacije.osoba-json-show',[
            'osoba'=>$osoba
        ]);
    }

    public function osobeShow(){
        $putanja = storage_path('app/osobe_validirane.json');
        $json = file_get_contents($putanja);
        $osobe = json_decode($json,true);

        return view('validacije.osobe-json-show',[
            'osobe'=>$osobe
        ]);
    }
}
