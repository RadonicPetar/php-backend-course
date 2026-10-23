<?php

require_once "Proizvod.php";

$kat1 = new Kategorija();
$kat1->sifra="111";
$kat1->naziv="Voće";

$pr1 = new Proizvod();
$pr1->sifra = "100";
$pr1->naziv = "Jabuka";
$pr1->kolicina = 150;
$pr1->cijena = 2.99;
$pr1->datumIsteka = "24.04.2026";
$pr1->kategorija=$kat1;
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