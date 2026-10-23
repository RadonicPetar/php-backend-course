<?php

class Osoba{

    protected string $ime;
    protected string $prezime;

    public function setIme($ime){
        $this->ime = $ime;
    }

    public function setPrezime($prezime){
        $this->prezime = $prezime;
    }

    public function getPunoIme(){
        return $this->ime." ".$this->prezime;
    }
    
}