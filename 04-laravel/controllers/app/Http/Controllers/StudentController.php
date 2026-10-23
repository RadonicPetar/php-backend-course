<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function show(int $id){
        return "Prikaz studenta s ID-em: {$id}";
    }
}
