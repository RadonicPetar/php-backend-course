<?php

/*
napraviti klasu Osoba sa sljedećim svojstvima:
- OIB - string - private svojstvo
- Ime - string - private svojstvo
- Prezime - string - private svojstvo
- Plaća - float - protected svojstvo
- Spol - string - public svojstvo

napraviti tri metode:
- dohvati podatke (ispisati oib, ime, prezime i spol)
- dohvati plaću (ispisati plaću, te izračunati PDV uz pomoć dodatne metode)

napraviti klasu Pravna koja nasljeđuje klasu Osoba te dodati dodatna svojstva:
- statusSubjekta - string - protected
- unutar ove klase napraviti protected metodu PovecajPlacu prema uvjetima: ako je statusSubjekta P, povećati za 10% plaću,
inače ostaviti istu.
- ispisati podatke o pravnoj osobi putem nove metode PodaciPravneOsobe
*/

class Osoba{

    private string $oib;
    private string $ime;
    private string $prezime;
    private float $placa;
    public string $spol;

    public function setOib(string $oib){
        $this->oib = $oib;
    }

    public function setIme(string $ime){
        $this->ime = $ime;
    }

    public function setPrezime(string $prezime){
        $this->prezime = $prezime;
    }
    public function setPlaca(float $placa){
        $this->placa = $placa;
    }

    public function DohvatiPodatke(): void{
        echo "<h3>Podaci osobe</h3>";
        echo "<br>OIB: ".$this->oib;
        echo "<br>Ime: ".$this->ime;
        echo "<br>Prezime: ".$this->prezime;
        echo "<br>Spol: ".$this->spol;
    }

}

$osoba = new Osoba();
$osoba->setOib("1234567891");
$osoba->setIme("Pero");
$osoba->setPrezime("Peric");
$osoba->setPlaca(5299.35);
$osoba->spol="M";
$osoba->DohvatiPodatke();