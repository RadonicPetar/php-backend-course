<?php

class Auto{

    public $naziv;
    public $model;
    public $tezina;

    public $registracija;

    public $kilometraza;

    public function upali(){
        echo "<br>Auto ".$this->naziv." je upaljen";
    }

    public function brojKubika(){
        return $this->tezina*1.3;
    }

    public function VratiGrad(){
        $oznakaGrad = substr($this->registracija,0,2);
        return $oznakaGrad;
    }

    public function Servis(){
        if($this->kilometraza>150000){
            $generalniServis = "GENERALNI SERVIS: DA";
        }
        else
            {
                $generalniServis = "GENERALNI SERVIS: NE";
            }
            return $generalniServis;
    }

}

$auto1 = new Auto();//stvaram novu instancu klase - objekt
$auto1->naziv = "Fiat";
$auto1->model = "Punto";
$auto1->tezina = 850;
$auto1->registracija="ZG1850DT";
$auto1->kilometraza=158000;

echo "<br>Naziv: ".$auto1->naziv;
echo "<br>Model: ".$auto1->model;
echo "<br>Tezina: ".$auto1->tezina;
echo "<br>Broj kubika: ".$auto1->brojKubika();
echo "<br>Grad: ".$auto1->VratiGrad();
echo "<br>Servis: ".$auto1->Servis();
$auto1->upali();

$auto2 = new Auto();
$auto2->naziv = "Volkswagen";
$auto2->model = "Golf";
$auto2->tezina = 1000;
$auto2->registracija="ST876IM";
$auto2->kilometraza=18000;
echo "<br>Naziv: ".$auto2->naziv;
echo "<br>Model: ".$auto2->model;
echo "<br>Tezina: ".$auto2->tezina;
echo "<br>Broj kubika: ".$auto2->brojKubika();
echo "<br>Grad: ".$auto2->VratiGrad();
echo "<br>Servis: ".$auto2->Servis();
$auto2->upali();

//dodati svojstvo kilometraža, te preko metode vratiti da li je auto za generalni servis pod uvjetima:
//ako je kilometraža veća od 150000, ispisati GENERALNI SERVIS: DA, inače ispisati GENERALNI SERVIS: NE
