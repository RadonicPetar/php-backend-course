<?php

require_once "Kategorija.php";
class Proizvod{

    public int $sifra;
    public string $naziv;
    public int $kolicina;
    public float $cijena;
    public string $datumIsteka;

    //povezati sa klasom Kategorija
    public Kategorija $kategorija;

    public function IspisiPodatkeProizvoda(){
        echo "<br>Ovo je proizvod ".$this->sifra.", ".$this->naziv;
    }

    public function UkupanIznos(){
        $ukupno = $this->kolicina*$this->cijena;
        return $ukupno;
    }

    public function PDV(){
        return $this->UkupanIznos()*25/125;
    }

    public function JeIstekao(): bool{
        $danas = date("Y-m-d");
        if(strtotime($this->datumIsteka) < strtotime($danas)){
            return true;
        }
        return false;
    }

    public function IspisiStatusRoka(){
        if($this->JeIstekao()){
            echo "<br>Proizvodu je istekao rok trajanja";
        }
        else
        {
            echo "<br>Proizvod je još važeći!";
        }
    }

    public function IspisiSve(){

        echo "<h2>ISPIS SVEGA</h2>";
        echo "<br>Šifra proizvoda: ".$this->sifra;
        echo "<br>Naziv proizvoda: ".$this->naziv;
        echo "<br>Količina proizvoda: ".$this->kolicina;
        echo "<br>Cijena proizvoda: ".$this->cijena;
        echo "<br>Datum isteka proizvoda: ".$this->datumIsteka;
        echo "<br>Ukupno: ".$this->UkupanIznos();
        echo "<br>PDV: ".$this->PDV();
        $this->IspisiStatusRoka();
        echo "<br>==================================";
        echo "<br>PODACI O KATEGORIJI<br>";
        echo "<br>Šifra kategorije: ".$this->kategorija->sifra;
        echo "<br>Naziv kategorije: ".$this->kategorija->naziv;
        $this->kategorija->PodaciKategorije();
    }
}