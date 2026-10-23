<?php
require_once "ViseSucelja.php";
/*
potrebno je u datoteku ViseSucelja.php dodati novo sučelje IzracunPoreza.
potrebno je napraviti klasu proizvod sa svojstvima id, kolicina, cijena
koja će implrementirati sucelje IzracunPoreza tako što će se izračunati sadržani porez ako porezna stopa iznosi 36%.
*/

class Proizvod implements IzracunPoreza{

    private int $id;
    private int $kolicina;
    private float $cijena;

    public function __construct(int $id, int $kolicina, float $cijena){
        $this->id=$id;
        $this->kolicina=$kolicina;
        $this->cijena=$cijena;
    }

    public function ukupno() : float {
        return $this->kolicina*$this->cijena;
    }
    public function izracunajPorez(): float{
        return $this->ukupno()*36/136;
    }

    public function ispisidetalje(): void{
        echo "<br>Id: ".$this->id;
        echo "<br>Kolicina: ".$this->kolicina;
        echo "<br>Cijena: ".$this->cijena;
        echo "<br>Ukupno: ".$this->ukupno();
        echo "<br>Porez: ".$this->izracunajPorez();
    }
}

$p1 = new Proizvod(1,5,10);
$p2 = new Proizvod(2,3,20);

$p1->ispisidetalje();
$p2->ispisidetalje();