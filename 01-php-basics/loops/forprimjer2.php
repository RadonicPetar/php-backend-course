<?php

        /*
        treba napraviti ovaku piramidu pomoću for petlje:
        1
        12
        123
        1234
        12345
        */

$broj_redova=5;

for($i=1;$i<=$broj_redova;$i++){

    for($j=1;$j<=$i;++$j){
        echo $j." ";
    }
    echo PHP_EOL;
}

?>