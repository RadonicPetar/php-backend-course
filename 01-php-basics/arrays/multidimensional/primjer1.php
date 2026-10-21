<?php

$ucenici = [
    ["Ana",5],
    ["Marko",4],
    ["Ivan",3]
];

echo "\nElement: ".$ucenici[0][0];
echo "\nElement: ".$ucenici[0][1];
echo "\nElement: ".$ucenici[1][0];
echo "\nElement: ".$ucenici[1][1];

//ispis preko for petlje
echo "\nISPIS PREKO FOR PETLJE:\n"; 
for($i=0;$i<count($ucenici);$i++){

    for($j=0;$j<count($ucenici[$i]);$j++){
        echo $ucenici[$i][$j]." ";
    }
    echo PHP_EOL;
}

echo "\nISPIS PREKO FOREACH PETLJE:\n"; 

foreach($ucenici as $i=>$red){

    foreach($red as $j=>$element){
        echo "\nElement {$element} se nalazi na poziciji {$i},{$j}";
    }
}

?>