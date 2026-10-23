<?php

require_once "Osoba.php";

class Student extends Osoba{

    private string $jmbag;

    public function __construct(string $ime, string $prezime, float $placa, string $jmbag){
        parent::__construct($ime,$prezime,$placa);
        $this->jmbag=$jmbag;
    }

    public function TipKorisnika(): string{
        if($this->placa>3000){
            return "Admin";
        }
        return "Korisnik";
    }

    public function IspisiStudenta(): void{
        $this->IspisDetalja();
        echo "<p>JMBAG: {$this->jmbag}</p>";
    }
}