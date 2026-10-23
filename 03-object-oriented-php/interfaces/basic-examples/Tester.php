<?php

require_once "ViseSucelja.php";

class Tester implements Ispis, Izracun, Spremanje{

    private string $ime;
    private string $datumrod;

    public function __construct(string $ime, string $datumrod){
        $this->ime = $ime;
        $this->datumrod = $datumrod;
    }

    public function ispisi(): string{
        return $this->ime." - ".$this->datumrod;
    }

    public function BrojZnakova(): int{
        return strlen($this->ime);
    }

    public function spremi(): void{
        echo "Student uspješno spremljen!";
    }

    public function VratiGodiste(): int{
        return date("Y")-date("Y",strtotime($this->datumrod));
    }
}

$t1 = new Tester("Pero","22.11.2000");
echo $t1->ispisi()."<br>";
echo $t1->BrojZnakova()."<br>";
echo $t1->VratiGodiste()."<br>";
$t1->spremi();