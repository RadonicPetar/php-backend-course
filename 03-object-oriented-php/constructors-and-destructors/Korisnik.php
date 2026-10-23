<?php

class Korisnik{

    public string $ime;
    private int $status;

    public function __construct(string $ime="Nepoznato",int $status = 1){
        $this->ime=$ime;
        $this->status=$status;
    }

    public function prikazPodataka(): void{
        echo "<br>Korisnik: ".$this->ime." (Status: ".$this->status.")";
    }

    public function __destruct(){
        echo "<br>Destruktor: objekt se uništava";
    }
}

$k1 = new Korisnik();
$k1->prikazPodataka();

$k2 = new Korisnik("Lana",2);
$k2->prikazPodataka();