<?php

require_once "NeaktivanAutomobilException.php";
class Vlasnik{
    private string $ime;

    public function __construct(string $ime){
        $this->ime = $ime;
    }

    public function dodijeliAutomobil(Automobil $auto){
        if(!$auto->jeAktivan()){
            throw new NeaktivanAutomobilException($auto->getNaziv());
        }

        echo "<br>Automobil {$auto->getNaziv()} dodijeljen vlasniku {$this->ime}";
    }
}