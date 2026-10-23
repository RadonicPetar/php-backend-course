<?php

class Auto{

    private string $naziv;

    public function postaviNaziv($noviNaziv){
        $this->naziv = $noviNaziv;
    }

    public function dohvatiNaziv(){
        return $this->naziv;
    }
}

$auto=new Auto();
$auto->postaviNaziv("Fiat");
echo "<br>Naziv je: ".$auto->dohvatiNaziv();