<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ListController extends Controller
{
    public function list(){
        $items = [
            "1"=>"Vrtić",
            "2"=>"Trgovina",
            "3"=>"Dvorište"
        ];

        $output = "<h1>Popis</h1>";
        $output.="<ul>";
        foreach($items as $id=>$name){
            $output.="<li>{$id} - {$name}</li>";
        }
        $output.="</ul>";

        return $output;
    }
}
