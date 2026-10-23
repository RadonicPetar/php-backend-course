<?php

class Kategorija{
    public int $sifra;
    public string $naziv;

    public function PodaciKategorije(){
        echo "<br>Kategorija ".$this->sifra.", naziv ".$this->naziv;
    }
}