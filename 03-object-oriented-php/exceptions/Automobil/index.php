<?php

require_once "Automobil.php";
require_once "Vlasnik.php";

try{
    $auto = new Automobil("BMW",false);
    $vlasnik = new Vlasnik("Marko");

    $vlasnik->dodijeliAutomobil($auto);
}
catch(NeaktivanAutomobilException $nae){
    echo "Greška: ".$nae->getMessage();
}