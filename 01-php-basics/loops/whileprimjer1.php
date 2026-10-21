<?php

/*
napraviti program za upis nekog broja, te nakon upisa potrebno je ispisati sve brojeve od 0 do tog broja.
Nakon ispisa brojeva, program treba pitati: Da li želite nastaviti s radom? Odgovor "ne" bi trebao izići iz programa, dok bi
odgovor "da" značio nastavak.
*/

$odgovor = "da";

while($odgovor!="ne"){

    $broj=(int)readline("Unesite broj: ");
    $i=0;
    while($i<=$broj){
        echo "Vrijednost: ".$i.PHP_EOL;
        $i++;
    }

    $odgovor=readline("Želite još?");
}

echo "Program završen...".PHP_EOL;

?>