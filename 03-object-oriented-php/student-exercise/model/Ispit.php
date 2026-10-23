<?php

class Ispit{

    public string $sifra;
    private string $naziv;
    protected string $datum;

    public function setNaziv($naziv){
        $this->naziv=$naziv;
    }

    public function getNaziv(){
        return $this->naziv;
    }

    public function setDatum($datum){
        $this->datum=$datum;
    }

    public function getDatum(){
        return $this->datum;
    }

    public function spremi(){


        $putanja = "storage";
        if(!is_dir($putanja)){
            mkdir($putanja);
        }
        $putanja=$putanja."/ispit.json";

        $podaci = [];
        if(file_exists($putanja)){
            $podaci=json_decode(file_get_contents($putanja),true);
        }

        $podaci[]=[
            "sifra"=>$this->sifra,
            "naziv"=>$this->naziv,
            "datum"=>$this->datum
        ];

        file_put_contents($putanja,json_encode($podaci,JSON_PRETTY_PRINT));
    }

    public static function dohvatiSve(): Array{
        $putanja="storage/ispit.json";

        if(!file_exists($putanja)){
            return [];
        }

        return json_decode(file_get_contents($putanja),true);
    }
}