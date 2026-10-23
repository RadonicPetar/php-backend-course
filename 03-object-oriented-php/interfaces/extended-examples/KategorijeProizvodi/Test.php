<?php

require_once "Kategorija.php";
require_once "Proizvod.php";

$dir = __DIR__."/storage";
if(!is_dir($dir)){
    mkdir($dir);
}

$k1 = new Kategorija("Voće");
$k1->spremi();

$k2 = new Kategorija("Povrće");
$k2->spremi();

$kategorije = Kategorija::dohvatiSve();

foreach($kategorije as $kat){
    echo "<br>Sifra: ".$kat["sifra"];
    echo "<br>Naziv: ".$kat["naziv"];
}

$p1 = new Proizvod("Jabuka",2.5,$k1);
$p1->spremi();

$p2 = new Proizvod("Mrkva",3.5,$k2);
$p2->spremi();

$p3 = new Proizvod("Banana",2.99,$k1);
$p3->spremi();

$proizvodi = Proizvod::dohvatiSve();

foreach($proizvodi as $pro){
    echo "<br>Id: ".$pro["id"];
    echo "<br>Naziv: ".$pro["naziv"];
    echo "<br>Cijena: ".$pro["cijena"];
    echo "<br>Kategorija: ".$pro["kategorijaSifra"];
}

echo "<h3>Proizvodi i kategorije</h3>";

$lista = Proizvod::dohvatiSaKategorijama();

foreach($lista as $item){
    echo "<br>".$item["naziv"]." - ".$item["cijena"]." € - ".$item["kategorija"];
}

echo "<p><a href='?reset=1'>Resetiraj</a>";

if(isset($_GET["reset"])){
    Proizvod::ProvjeriPostojanje();
    header("Location: Test.php");
}

/*
napraviti unos novih proizvoda preko html forme koristeći sve do sad napravljeno.
*/