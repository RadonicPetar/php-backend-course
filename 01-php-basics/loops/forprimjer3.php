<?php

/*
    treba napraviti ovaku piramidu pomoću for petlje:
        1
       212
      32123
     4321234
    543212345
*/

$n=5;

for($i=1;$i<=$n;$i++){

        //razmaci
        for($j=$n; $j>$i;$j--){
            echo " ";
        }

        //silazni brojevi
        for($j=$i;$j>=1;$j--){
            echo $j;
        }

        //uzlazni brojevi
        for($j=2;$j<=$i;$j++){
            echo $j;
        }

        echo PHP_EOL;

}

?>