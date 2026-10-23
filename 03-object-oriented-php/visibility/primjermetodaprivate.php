<?php

class Korisnik
{
    private function formatirajIme($ime): string{
        return ucfirst(strtolower($ime));
    }

    public function prikaziIme($ime){
        echo $this->formatirajIme($ime);
    }

}

$korisnik = new Korisnik();
$korisnik->prikaziIme("IVAN");
//$korisnik->formatirajIme("IVAN");