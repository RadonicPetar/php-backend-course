<?php

class Vozilo
{
    protected int $sifra = 100;
    protected function pokreniMotor(){
        return "Motor je pokrenut";
    }
}

class Auto extends Vozilo{
    public function upaliAuto(){
        echo $this->pokreniMotor();
    }

    protected function DuplaSifra(){
        return $this->sifra*2;
    }

    public function IspisSifre(){
        echo $this->DuplaSifra();
    }
}

$auto = new Auto();
$auto->upaliAuto();
//$auto->pokreniMotor();
$auto->IspisSifre();