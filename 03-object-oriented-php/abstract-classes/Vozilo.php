<?php

abstract class Vozilo{

    protected string $marka;

    public function __construct(string $marka){
        $this->marka = $marka;
    }

    abstract public function pokreni();

    abstract public function brojKubika(): int;

    public function info(){
        echo "<br>Ovo je vozilo marke ".$this->marka;
    }
}

class Auto extends Vozilo{

    public function pokreni(){
        echo "<br>Auto ".$this->marka." se pokreće pomoću ključa!";
    }

    public function brojKubika(): int{
        return 300;
    }
}

class ElektricniAuto extends Vozilo{

    private bool $ubrzanje;

    public function __construct(string $marka){
        parent::__construct($marka);
        $this->ubrzanje = true;
    }

    public function pokreni(){
        echo "<br>Auto ".$this->marka." se pokreće pomoću tipke START";
    }

    public function stani(){
        echo "<br>Auto ".$this->marka." staje na kočnice!";
    }

    public function ImaUbrzanje(): bool{
        return $this->ubrzanje;
    }

    public function brojKubika(): int{
        return 500;
    }
}

$v1 = new Auto("Golf 3");
$v1->info();
$v1->pokreni();
echo $v1->brojKubika();

$v2 = new ElektricniAuto("Audi 7");
$v2->info();
$v2->pokreni();
$v2->stani();
echo $v2->brojKubika();
echo "<br>Ubrzanje: ".$v2->ImaUbrzanje();