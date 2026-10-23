<?php

require_once "Osoba.php";

class Student extends Osoba{

    private string $jmbag;
    private int $godinaStudija;

    public function setJmbag($jmbag){
        $this->jmbag=$jmbag;
    }

    public function getJmbag(){
        return $this->jmbag;
    }

    public function setGodinaStudija($godina){
        $this->godinaStudija = $godina;
    }

    public function spremi(){


        $putanja = "storage";
        if(!is_dir($putanja)){
            mkdir($putanja);
        }
        $putanja=$putanja."/student.json";

        $podaci = [];
        if(file_exists($putanja)){
            $podaci=json_decode(file_get_contents($putanja),true);
        }

        $podaci[]=[
            "ime"=>$this->ime,
            "prezime"=>$this->prezime,
            "jmbag"=>$this->jmbag,
            "godina"=>$this->godinaStudija
        ];

        file_put_contents($putanja,json_encode($podaci,JSON_PRETTY_PRINT));
    }

    public static function dohvatiSve(): Array{
        $putanja="storage/student.json";

        if(!file_exists($putanja)){
            return [];
        }

        return json_decode(file_get_contents($putanja),true);
    }
}