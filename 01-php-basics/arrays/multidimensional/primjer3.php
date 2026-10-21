<?php

/*
potrebno je omogućiti unos broja studenata.
nakon toga potrenbo je za svakog studenta unijeti sljedeće podatke:
mat_broj (kljuc)
ime,
prezime,
adresu i
zaradu.
Podatke spremiti u multidimenzionalni niz gdje ce kljuc (identifikator) svakog studenta biti njegov maticni_broj.
podatke spremiti u obliku:
[
    "mat_broj"=>array("ime"=>Pero,"prezime"=>"Peric" itd...)
]
Ispisati studenta sa najvecom zaradom    
*/

$broj_stud = (int)readline("Unesite broj studenata: ");

for($i=1;$i<=$broj_stud;$i++){
    echo "\Unos podataka za {$i}. studenta:\n";
    $matbroj=readline("Unesite matični broj: ");
    $ime=readline("Unesite ime: ");
    $prezime=readline("Unesite prezime: ");
    $adresa=readline("Unesite adresu: ");
    $zarada=(float)readline("Unesite zaradu: ");

    $studenti[$matbroj]=[
        "ime"=>$ime,
        "prezime"=>$prezime,
        "adresa"=>$adresa,
        "zarada"=>$zarada,
    ];  
}

foreach($studenti as $matbroj=>$podaci){
    echo "\nMaticni broj: ".$matbroj;
    echo "\nIme: ".$podaci["ime"];
    echo "\nPrezime: ".$podaci["prezime"];
    echo "\nAdresa: ".$podaci["adresa"];
    echo "\nZarada: ".$podaci["zarada"];
    echo "\n============================";
}

echo "\nSTUDENT SA NAJVECOM ZARADOM\n";

$maxMatBroj="";
$maxPodaci=[];
$maxPlaca=-1;

foreach($studenti as $matbroj=>$podaci){
    if($podaci["zarada"]>$maxPlaca){
        $maxPlaca=$podaci["zarada"];
        $maxMatBroj=$matbroj;
        $maxPodaci=$podaci;
    }
}

echo "\nMatični broj: ".$matbroj;
echo "\nIme: ".$maxPodaci["ime"];

?>