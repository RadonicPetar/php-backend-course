<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(){
        $cities = ['Zagreb','Split','Rijeka','Osijek','Zadar'];
        return view('cities',
            ['cities'=>$cities]
        );
    }

}
