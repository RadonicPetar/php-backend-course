<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OsobaController extends Controller
{
    public function create(){
        return view('osobe.create');
    }

    public function store(Request $request){
        $osoba = [
            'id'=>Str::uuid()->toString(),
            'ime'=>$request->input('ime'),
            'prezime'=>$request->input('prezime'),
            'placa'=>(float)$request->input('placa')
        ];

        $putanja = storage_path('app/osobe.json');

        $osobe = [];

        if(file_exists($putanja)){
            $osobe = json_decode(file_get_contents($putanja),true) ?? [];
        }

        $osobe[]=$osoba;

        file_put_contents($putanja,json_encode($osobe,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

        return view('osobe.show',[
            'osoba'=>$osoba,
            'ukupno'=>count($request->all()),
            'sve'=>$request->all()
        ]);
    }

    public function prikazOsoba(){
        $putanja = storage_path('app/osobe.json');
        $json = file_get_contents($putanja);
        $osobe = json_decode($json,true);
        
        return view('osobe.prikaz',[
            'osobe'=>$osobe
        ]);
    }
}
