<?php

require_once "Osoba.php";

class Profesor extends Osoba{

    private string $titula;

    public function __construct(string $ime, string $prezime, float $placa, string $titula){
        parent::__construct($ime,$prezime,$placa);
        $this->titula=$titula;
    }

    public function TipKorisnika(): string{
        if($this->placa>3000){
            return "Admin";
        }
        return "Korisnik";
    }

    public function IspisiProfesora(): void{
        $this->IspisDetalja();
        echo "<p>Titula: {$this->titula}</p>";
    }
}