<?php

class Automobil{
    private string $naziv;
    private bool $aktivan;

    public function __construct(string $naziv, bool $aktivan){
        $this->naziv = $naziv;
        $this->aktivan = $aktivan;
    }

    public function jeAktivan(): bool{
        return $this->aktivan;
    }

    public function getNaziv(): string{
        return $this->naziv;
    }
}