<?php

class Proizvod{

    private float $cijena;

    public function postaviCijenu($novaCijena){
        if($novaCijena>0){
            $this->cijena=$novaCijena;
        }
        else
        {
            echo "<br>Cijena mora biti veća od 0";
        }
    }

    public function dohvatiCijenu(){
        return $this->cijena;
    }

}

$proizvod = new Proizvod();
$proizvod->postaviCijenu(150);
echo "<br>Cijena je: ".$proizvod->dohvatiCijenu();

$proizvod->postaviCijenu(-20);