<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LayoutDemoController extends Controller
{
    public function home()
    {
        return view('layoutdemo.home');
    }

    public function about()
    {
        return view('layoutdemo.about');
    }

    public function car()
    {
        return view('layoutdemo.car',[
            'marka'=>'Škoda',
            'model'=>'Octavia',
            'godiste'=>2022,
            'cijena'=>24500
        ]);
    }

    public function createBook(){
        return view('layoutdemo.book-form');
    }

    public function storeBook(Request $request)
    {
        $validated = $request->validate([
            'naziv'=>'required|min:3',
            'autor'=>'required|min:3',
            'godina'=>'required|integer|min:1900',
            'cijena'=>'required|numeric|min:0',
        ]);

        return view('layoutdemo.book-success',[
            'book'=>$validated
        ]);
    }

    public function alertDemo(){
        return view('layoutdemo.alert-demo');
    }

    public function cardDemo(){
        return view('layoutdemo.card-demo');
    }

    public function tecajeviDemo(){
        $tecajevi = [
            [
                'naziv'=>'PHP Osnove',
                'opis'=>'Ovo su PHP osnove',
            ],
            [
                'naziv'=>'MySQL Osnove',
                'opis'=>'Ovo su MySQL osnove',
            ],
            [
                'naziv'=>'Laravel Osnove',
                'opis'=>'Ovo su Laravel osnove',
            ],
        ];

        $izvodjac="Algebra";

        return view('layoutdemo.tecajevi-demo',
            compact('tecajevi','izvodjac')
        );
    }

    public function stackDemo(){
        return view('layoutdemo.stack-demo');
    }

    public function stackJS(){
        return view('layoutdemo.stack-js');
    }

    public function parentDemo()
    {
        return view('layoutdemo.parent-demo');
    }

    public function productsTable()
    {
        $headers=['ID','Naziv','Cijena'];

        $rows = [
            [1,'Kruh',1.20],
            [2,'Mlijeko',1.79],
            [3,'Voće',2.23],
        ];

        return view('layoutdemo.products-table',[
            'headers'=>$headers,
            'rows'=>$rows,
        ]);
    }

    public function vehiclesTable()
    {
        $headers=['ID','Marka','Godište','Registracija'];

        $rows = [
            [1,'Škoda',2020,'ZG-123-AA'],
            [2,'Renault',2018,'ST-444-BA'],
            [3,'BMW',2010,'RI-4432-Z'],
        ];

        return view('layoutdemo.vehicles-table',[
            'headers'=>$headers,
            'rows'=>$rows,
        ]);
    }

    public function categoriesTable(){
        $headers=['ID','Naziv','Opis'];

        $rows=[];

    return view('layoutdemo.categories-table',[
            'headers'=>$headers,
            'rows'=>$rows,
        ]);
    }
}
