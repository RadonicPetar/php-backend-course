<?php

/*
Napraviti program koji će preko while petlje omogućiti unos brojeva sve dok je uneseni broj paran.
Nakon što se unese neparan broj, potrebno je ispisati zbroj svih unesenih brojeva, te broj onih koji su djeljivi sa 4 te izići iz programa.
*/

$zbroj=0;
$brojDjeljivihSa4=0;

$broj=0;

while($broj%2==0){

    $broj=readline("Unesite broj: ");

    if($broj%2!=0){
        break;
    }

    $zbroj+=$broj; //$zbroj = $zbroj+$broj;

    if($broj%4==0){
        $brojDjeljivihSa4++;
    }
}

echo "Zbroj svih unesenih brojeva je ".$zbroj.PHP_EOL;
echo "Broj brojeva djeljivih sa 4 je ".$brojDjeljivihSa4.PHP_EOL;


?>