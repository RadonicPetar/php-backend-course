<?php

/*
Primjer zadatka

Potrebno je napraviti klasu OsobaPodaci koja iz datoteke:

storage/podaci.json

čita podatke o 50 osoba.

Konstruktor treba:
definirati svojstva osobe
postaviti vrijeme početka obrade
Destruktor treba:
zabilježiti vrijeme završetka obrade

Koristiti PHP OOP klasu:

DateTime

te prikazati:

datum i vrijeme početka obrade
ispis svih osoba iz JSON datoteke
datum i vrijeme završetka obrade

Vrijeme treba sadržavati i milisekunde.
*/

class OsobaPodaci{

    private string $putanja;
    private array $podaci=[];
    private DateTime $pocetakObrade;

    public function __construct(string $putanja){
        $this->putanja = $putanja;
        $this->pocetakObrade = new DateTime();

        echo "<h2>Početak obrade</h2>";
        echo $this->pocetakObrade->format("d.m.Y H:i:s.u")."<br><br>";

        $this->UcitajPodatke();
    }

    private function UcitajPodatke(): void{
        if(file_exists($this->putanja)){
            $this->podaci = json_decode(file_get_contents($this->putanja),true);
        }
        else
        {
            echo "<br>Datoteka ne postoji!";
        }
    }

    public function IspisiPodatke(): void{
        echo "<h2>Ispis osoba</h2>";
        foreach($this->podaci as $osoba){
            echo "<br>Ime: ".$osoba["ime"];
            echo "<br>Prezime: ".$osoba["prezime"];
            echo "<br>Godine: ".$osoba["godine"];
            echo "<hr>";
            sleep(1);
        }
        echo "<br>Ukupno osoba: ".count($this->podaci);
    }

    public function __destruct(){
        $zavrsetakObrade = new DateTime();
        echo "<h2>Završetak obrade</h2>";
        echo $zavrsetakObrade->format("d.m.Y H:i:s.u");

        $pocetakTimeSTamp = (float)$this->pocetakObrade->format("U.u");
        $zavrsetakTimeSTamp = (float)$zavrsetakObrade->format("U.u");

        $trajanje = $zavrsetakTimeSTamp - $pocetakTimeSTamp;

        echo "<h2>Ukupno trajanje obrade</h2>";
        echo round($trajanje,3)." sekundi";
    }
}

$osoba = new OsobaPodaci("storage/podaci.json");
$osoba->IspisiPodatke();