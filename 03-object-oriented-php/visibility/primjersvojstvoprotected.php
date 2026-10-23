<?php

class Vozilo{
    protected string $naziv="Opće vozilo";

    public function Podaci(){
        return $this->naziv;
    }
}

class Auto extends Vozilo{
    public function PrikaziNaziv(){
        echo $this->naziv;
    }
}

$voz = new Vozilo();

echo "<br>Prikaz protected sa public: ".$voz->Podaci();

$auto = new Auto();
echo "<br>Prikaz protected sa extended Auto: ".$auto->Podaci();
echo "<br>Prikaz public metode definirane u extended clasi Auto: ";
$auto->PrikaziNaziv();


