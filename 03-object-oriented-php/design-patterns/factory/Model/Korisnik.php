<?php

namespace Factory\Model;

class Korisnik
{
    private string $ime;

    public function __construct(string $ime){
        $this->ime = $ime;
    }

    public function info(): string{
        return "KORISNIK: {$this->ime}";
    }
}