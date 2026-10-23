<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViewController extends Controller
{
    public function show()
    {
        return view('prikaz',[
            'ime'=>'Pero',
            'prezime'=>'Peric',
            'godina'=>2
        ]);
    }

    public function status(){
        return view('prikaz-status',[
            'ime'=>'Pero',
            'godine'=>rand(15,23)
        ]);
    }

    public function statusAdvanced(){

        if(view()->exists('prikaz-status-advanced'))
        {
            return view('prikaz-status-advanced',[
                'ime'=>'Pero',
                'godine'=>rand(15,85),
                'adresa'=>'Prva ulica br. 3'
            ]);
        }
        return response('Traženi view ne postoji',404);
    }

    public function booksEmpty()
    {
        return view('books-empty',[
            'books'=> ['Clean Code']
        ]);
    }

    public function books()
    {
        return view('books',[
            'books'=> [
                'Clean Code',
                'Laravel Up & Running',
                'Design Patterns'
                ]
        ]);
    }

    public function products()
    {
        return view('products',[
            'products'=>['Laptop','Mobile']
        ]);
    }
}
