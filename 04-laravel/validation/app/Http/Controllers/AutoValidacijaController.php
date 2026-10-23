<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutoValidacijaController extends Controller
{
    public function create()
    {
        return view('validacije.auto');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv'=>'required|min:2',
            'registracija'=>'required|min:6|max:15',
            'registracija_potvrda'=>'required|same:registracija',
            'godiste'=>'required|integer|min:1950|max:'.date("Y"),
            'kilometri'=>'required|numeric|between:14000,150000',
            'oznaka_drzave'=>'required|size:2',
            'broj_sasije'=>'required|digits:8',
        ],
        [
            'naziv.required' => 'Naziv automobila je obavezan!',
            'naziv.min' => 'Naziv automobila mora imati barem :min znaka',

            'registracija.required' => 'Registracija automobila je obavezna!',
            'registracija.min' => 'Registracija automobila mora imati barem :min znakova',
            'registracija.max' => 'Registracija automobila ne smije imati više od :max znakova',
            'registracija_potvrda.same' => 'Potvrda registracije mora biti jednaka prethodno unesenoj vrijednosti',

            'godiste.required' => 'Godište automobila je obavezan podatak!',
            'godiste.min' => 'Godište ne smije biti manje od :min',
            'godiste.max' => 'Godište ne smije biti veće od trenutne godine',
            'godiste.integer' => 'Godište mora biti cijeli broj',

            'kilometri.required' => 'Kilometri su obavezan podatak!',
            'kilometri.between' => 'Kilometri moraju biti između :min i :max kilometara',

            'oznaka_drzave.size' => 'Oznaka države mora imati točno :size znaka',
            'broj_sasije.digits' => 'Broj šasije mora imati točno :digits znamenki',
        ]);

    return view('validacije.rezultat',[
        'podaci'=>$validated
    ]);
    }
}
