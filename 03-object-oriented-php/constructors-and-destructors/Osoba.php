<?php

/*
PRIMJER 3
Konstruktor + protected + nasljeđivanje
Što primjer radi

Klasa Osoba ima zajedničke podatke.

Klasa Zaposlenik nasljeđuje Osoba
i dodaje plaću.
*/

class Osoba{

    protected string $ime;
    protected string $prezime;

    public function __construct(
        string $ime, string $prezime
    )
    {
        $this->ime=$ime;
        $this->prezime=$prezime;
    }

    public function getPunoIme(): string{
        return $this->ime." ".$this->prezime;
    }
}

class Zaposlenik extends Osoba{

    private float $placa;

    public function __construct(
        string $ime, string $prezime, float $placa
    )
    {
        parent::__construct($ime,$prezime);
        $this->placa=$placa;
    }

    public function getPlaca(): float{
        return $this->placa;
    }

}

$zaposlenik = new Zaposlenik("Ana","Anic",1500.50);

echo $zaposlenik->getPunoIme();
echo "<br>";
echo $zaposlenik->getPlaca();