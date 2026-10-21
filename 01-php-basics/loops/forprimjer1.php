<?php

/*
potrebno je preko for petlje napraviti program za računanje faktorijela nekog slučajnog broja u rasponu od
3 do 8
npr. 5 = 5 * 4 * 3 * 2 * 1
*/

$broj = rand(3,8);

$faktorijeli=1;
for($temp=$broj;$temp>1;$temp--){
    $faktorijeli*=$temp; //$faktorijeli = $faktorijeli*$temp;
}

echo "Faktorijeli broja {$broj} iznose {$faktorijeli}".PHP_EOL;

?>