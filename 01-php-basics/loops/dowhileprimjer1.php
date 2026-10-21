<?php

/*
preko do-while petlje napraviti program za upis nekog broja, te nakon upisa potrebno je ispisati sve brojeve od 0 do tog broja.
Nakon ispisa brojeva, program treba pitati: Da li želite nastaviti s radom? Odgovor "ne" bi trebao izići iz programa, dok bi
odgovor "da" značio nastavak.
*/

do{
    $broj=(int)readline("Unesite broj: ");

    $i=1;
    do{
        echo $i.PHP_EOL;
        $i++;
    }
    while($i<=$broj);
    $odgovor=readline("Želite još: ");
}
while($odgovor!="ne");

echo "Program završen...".PHP_EOL;
?>