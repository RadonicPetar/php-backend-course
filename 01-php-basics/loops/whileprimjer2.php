<?php

/*
napraviti program koji će pogađati PIN koji je zapisan u sustavu.
program se treba izvršavati sve dok se ne pogodi PIN.
Nakon što se pogodi PIN, potrebno je ispisati iz kojeg pokušaja je PIN pogođen.

DODATAK: nakon tri neuspjela pokušaja, izići iz programa, te ispisati poruku: Dosegli ste maksimalan broj promašaja!
*/

$pin="1234";
$unos="";
$pokusaji=0;

while($unos != $pin){

    $unos=readline("Unesite PIN: ");
    $pokusaji++;

    if($unos != $pin){
        echo "Pogrešan PIN!".PHP_EOL;
        echo "Ostalo još ".(3-$pokusaji)." pokušaja!".PHP_EOL;
    }

    if($pokusaji==3){
        echo "Dosegli ste maksimalan broj promašaja!";
        break;
    }

}

if($unos==$pin){
    echo "PIN je točan!".PHP_EOL;
    echo "Broj pokušaja: ".$pokusaji.PHP_EOL;
}



?>