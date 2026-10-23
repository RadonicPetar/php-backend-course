<?php

/*
napraviti apstraktnu klasu osoba sa svojstvima ime, prezime i placa
napraviti konstruktor koji će postaviti sva tri svojstva
postaviti implementacijsku apstrakntu metodu tipKorisnika koja će vratiti Admin ukoliko je plaća 
veća od 3000, odnosno Korisnik ukoliko je manja od 3000.
apstraktna klasa ima i public metodu za ispis detalja korisnika

napraviti još dvije child metode Student i Profesor koje će nasljediti
apstraktnu klasu Osoba. Student će imati dodatno svojstvo jmbag, a profesor Titulu.
Odvojiti klase u posebne datoteke

dodati abstraktnu metodu za izracun broja godina.
*/

abstract class Osoba{
    protected string $ime;
    protected string $prezime;
    protected float $placa;

    public function __construct(string $ime, string $prezime, float $placa){
        $this->ime=$ime;
        $this->prezime=$prezime;
        $this->placa=$placa;
    }

    abstract public function TipKorisnika() : String;

    public function IspisDetalja(): void{
        echo "<br>Ime: {$this->ime}";
        echo "<br>Prezime: {$this->prezime}";
        echo "<br>Placa: {$this->placa}";
        echo "<br>Tip korisnika: {$this->TipKorisnika()}";
    }
}