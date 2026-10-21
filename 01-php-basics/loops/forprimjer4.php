<?php

/*
potrebno je omogućiti unos dva broja, te nakon toga napraviti sljedeće:
- ako je prvi broj veći od drugog, ispisati sve brojeve od prvog do drugog preko for petlje
- ako je prvi broj manji od drugog, drugi broj ispisati onoliko puta kolika je vrijednost broja 1 preko while petlje
- ako su jednaki, ispisati trećinu njihovog zbroja
*/

$broj1=(int)readline("Unesite broj 1: ");
$broj2=(int)readline("Unesite broj 2: ");

if($broj1 > $broj2)
{
    echo "Prvi uvjet: ".PHP_EOL;
    for($broj1;$broj1>=$broj2;$broj1--){
        echo $broj1.",";
    }
}
elseif($broj1<$broj2)
{
    echo "Drugi uvjet: ".PHP_EOL;
    $i=1;
    while($i<=$broj1){
        echo $broj2.",";
        $i++;
    }
}
else
    {
        $trecina=($broj1+$broj2)/3;
        echo "Treći uvjet: {$trecina}".PHP_EOL;
    }



?>