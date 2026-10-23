<?php

class StudentIspit{

    public function prijavi($jmbag,$sifraIspita){

        $putanja = "storage/studentispiti.json";

        $podaci=[];

        if(file_exists($putanja)){
            $podaci=json_decode(file_get_contents($putanja),true);
        }

        $podaci[]=[
            "jmbag"=>$jmbag,
            "sifra_ispita"=>$sifraIspita
        ];

        file_put_contents($putanja,json_encode($podaci,JSON_PRETTY_PRINT));
    }

    public static function dohvatiSve(): Array{
        $putanja="storage/studentispiti.json";

        if(!file_exists($putanja)){
            return [];
        }

        return json_decode(file_get_contents($putanja),true);
    }
}