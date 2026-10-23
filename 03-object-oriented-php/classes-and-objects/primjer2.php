<?php

/*
napraviti klasu Proizvod i dodijeliti svojstva, te napraviti par metoda: za ispis podataka, ukupaniznos, te iznos PDV-a od 
ukupnogIznosa
Dodatak: napraviti novu klasu kategorija te ju povezati sa klasom proizvod
*/

class Kategorija{
    public int $sifra;
    public string $naziv;

    public function PodaciKategorije(){
        echo "<br>Kategorija ".$this->sifra.", naziv ".$this->naziv;
    }
}

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
            echo "<br>Proizvod je još važeži!";
        }
    }

    public function IspisiSve(){

        echo "<h2>ISPIS SVEGA</h2>";
        echo "<br>Šifra proizvoda: ".$this->sifra;
        echo "<br>Naziv proizvoda: ".$this->naziv;
        echo "<br>Količina proizvoda: ".$this->kolicina;
        echo "<br>Cijena proizvoda: ".$this->cijena;
        echo "<br>Ukupno: ".$this->UkupanIznos();
        echo "<br>PDV: ".$this->PDV();
        echo "<br>==================================";
        echo "<br>PODACI O KATEGORIJI<br>";
        echo "<br>Šifra kategorije: ".$this->kategorija->sifra;
        echo "<br>Naziv kategorije: ".$this->kategorija->naziv;
        $this->kategorija->PodaciKategorije();
    }
}

$kat1 = new Kategorija();
$kat1->sifra="111";
$kat1->naziv="Voće";

$pr1 = new Proizvod();
$pr1->sifra = "100";
$pr1->naziv = "Jabuka";
$pr1->kolicina = 150;
$pr1->cijena = 2.99;
$pr1->datumIsteka = "24.04.2026";
//$pr1->IspisiPodatkeProizvoda();
//echo "<br>Ukupan iznos: ".$pr1->UkupanIznos();
//echo "<br>PDV: ".$pr1->PDV();
$pr1->IspisiStatusRoka();
$pr1->kategorija=$kat1;
$pr1->IspisiSve();

$pr2 = new Proizvod();
$pr2->sifra = 200;
$pr2->naziv = "Banana";
$pr2->kolicina = 250;
$pr2->cijena = 2.49;
$pr2->datumIsteka = "2026-05-01";
//$pr2->IspisiPodatkeProizvoda();
//echo "<br>Ukupan iznos: ".$pr2->UkupanIznos();
//echo "<br>PDV: ".$pr2->PDV();
$pr2->IspisiStatusRoka();
$pr2->kategorija=$kat1;
$pr1->IspisiSve();

$kat2=new Kategorija();
$kat2->sifra = "222";
$kat2->naziv = "Povrće";

$pr3 = new Proizvod();
$pr3->sifra=300;
$pr3->naziv="Mrkva";
$pr3->kolicina = 350;
$pr3->cijena = 1.49;
$pr3->datumIsteka = "2026-06-20";
$pr3->kategorija = $kat2;
$pr3->IspisiSve();