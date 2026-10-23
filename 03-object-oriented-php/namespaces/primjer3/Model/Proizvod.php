<?php

namespace Model;

class Proizvod{
    public string $naziv;

    public function __construct(string $naziv){
        $this->naziv=$naziv;
    }

    public function ispisi(): void{
        echo "Proizvod: {$this->naziv}<br>";
    }
}