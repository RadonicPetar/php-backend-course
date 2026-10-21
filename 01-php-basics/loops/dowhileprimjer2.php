<?php

/*
preko do-while petlje
napraviti program koji će pogađati PIN koji je zapisan u sustavu.
program se treba izvršavati sve dok se ne pogodi PIN.
Nakon što se pogodi PIN, potrebno je ispisati iz kojeg pokušaja je PIN pogođen.

DODATAK: nakon tri neuspjela pokušaja, izići iz programa, te ispisati poruku: Dosegli ste maksimalan broj promašaja!
*/

$pin="1234";
$pokusaji=0;

do{
    $unos=readline("Unesite PIN: ");
    $pokusaji++;

    if($unos!=$pin){
        echo "Pogrešan PIN".PHP_EOL;
    }

    if($pokusaji==3 && $unos!=$pin){
        echo "Dosegli ste maksimalan broj promašaja!".PHP_EOL;
        break;
    }
}
while($unos!=$pin);

if($unos==$pin){
    echo "PIN je točan!".PHP_EOL;
    echo "Broj pokušaja: ".$pokusaji.PHP_EOL;
}

?>