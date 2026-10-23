<?php

interface Ispis{
    public function ispisi(): string;
}

class Ucenik implements Ispis{

    private string $ime;

    public function __construct(string $ime){
        $this->ime = $ime;
    }

    public function ispisi(): string{
        return "Ucenik: ".$this->ime;
    }
}

$s = new Ucenik("Pero");
echo $s->ispisi();