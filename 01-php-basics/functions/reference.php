<?php

echo "\nPRIMJER 1 - BEZ REFERENCE".PHP_EOL;

$a = 5;
$b = $a;

$a = 10;

echo $b;


echo "\nPRIMJER 2 - SA REFERENCOM".PHP_EOL;

$c = 5;
$d = &$c;

$c = 10;
echo "\nVarijabla D iznosi: ".$d;

echo "\nPRIMJER 3 - SA REFERENCOM".PHP_EOL;

$a=10;
$b = &$a;

$b = 20;

echo "\nA iznosi: ".$a;

echo "\nPRIMJER 3 - SA REFERENCOM - ZAMJENA VARIJABLE".PHP_EOL;
$m = 20;
$n = 30;

$tempp = &$m;

echo "\nTemp: ".$tempp;
$m = $n;
$n = $tempp;

echo PHP_EOL.$m." ".$n;

echo "\nPRIMJER 3 - SA REFERENCOM - ZAMJENE VARIJABLI".PHP_EOL;
function zamjeni($x,$y){
    $temp = $x;
    $x = $y;
    $y = $temp;
}

$x=10;
$y=20;
zamjeni($x,$y);

echo $x." - ".$y;

echo PHP_EOL;

function zamjeniref(&$i,&$j){
    $temp = $i;
    $i = $j;
    $j = $temp;
}

zamjeniref($x,$y);

echo $x." == ".$y;
?>