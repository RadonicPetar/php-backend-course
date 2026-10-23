<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function dashboard(){
        return 'Admin dashboard iz kontrolera.';
    }

    public function users(){
        return 'Popis admin korisnika iz kontrolera';
    }
}
