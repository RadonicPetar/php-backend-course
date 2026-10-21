<?php

//zadan je slučajni broj u rasponu od 1 do 5.
//napravite upis broja kroz konzolu, te ako pogodite broj, ispisati:
//Broj je pogođen inače ispisati Broj nije pogođen

$slucajni=rand(1,5);

$unos=(int)readline("Unesite broj:");

echo "\nSlucajni: ".$slucajni;
if($slucajni==$unos){
    echo "\nBroj je pogođen";
}
else
    {
        echo "\nBroj nije pogođen";
    }
?>