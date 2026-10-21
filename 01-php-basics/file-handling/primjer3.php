<?php

/*
Potrebno je napraviti program sa izbornikom:

1. Unos podataka
2. Ispis podataka
3. Pretraga podataka

Za unos podataka, potrebno je omogućiti unos pbroja proizvoda, te nakon toga za svaki proizvod unijeti:
šifru, naziv, količinu i cijenu. Podatke je potrebno spremiti u datoteku proizvodi.json koja će se nalaziti 
u folderu storage/proizvodi.json. Podatke je potrebno spremiti sa ključem šifra i vrijednostima (naziv, količina, cijena)
Za ispis podataka, potrebno je pročitati sve podatke iz json datoteke
Za pretragu podataka, potrebno je omogućiti unos šifre proizvoda, te ukoliko se proizvod pronađe, ispisati ga, inače
ispisati poruku: Ne postoji traženi proizvod.
NADOPUNA: za stavke od 1 do 3 u izborniku napraviti pomoću funkcija koje će se nalaziti u zasebnoj datoteci helpers.php
*/

include "helpers.php";

echo "\nIZBORNIK\n";

echo "\n1. Unos podataka";
echo "\n2. Ispis podataka";
echo "\n3. Pretraga podataka";

echo PHP_EOL;

$putanja = __DIR__."/storage/proizvodi.json";

$izbor = (int)readline("Unesite izbor: ");

echo PHP_EOL;

switch($izbor){

    case 1:
        UnosPodataka();
    break;
    case 2:
        IspisPodataka();
    break;
    case 3:
        $sifraUnos=readline("Unesite šifru: ");
        PretragaPodataka($sifraUnos);
    break;
}



?>