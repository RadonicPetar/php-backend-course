<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'naziv'=>[
                'required',
                'min:3',
                'regex:/^[A-ZČĆŽŠĐ]/u',
            ],
            'autor'=>[
                'required',
                'min:3',
                'max:50',
                'regex:/^[A-ZČĆŽŠĐ]/u',
            ],
            'godina'=>[
                'required',
                'integer',
                'min:1800',
                'max:'.date("Y"),
            ],
            'cijena'=>[
                'required',
                'numeric',
                'gt:0',
                'lte:500',
            ],
        ]);

        $knjiga=[
            'id'=>Book::getNextId(),
            'naziv'=>$validated['naziv'],
            'autor'=>$validated['autor'],
            'godina'=>(int)$validated['godina'],
            'cijena'=>(float)$validated['cijena'],
        ];

        Book::save($knjiga);

        //return response('Created',201);
        return redirect()->route('books.index');
    }

    public function index()
    {
        $knjige = Book::getAll();
        return view('books.index',[
            'knjige'=>$knjige
        ]);
    }
}
