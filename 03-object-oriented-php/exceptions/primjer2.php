<?php

function podijeli($a,$b){
    if($b==0){
        throw new Exception("Djeljenje s nulom!");
    }
    return $a/$b;
}

try{
    echo podijeli(10,0);
}
catch(Exception $ex){
    echo $ex->getMessage();
    echo "<br>";
    echo $ex->getCode();
        echo "<br>";
    echo $ex->getFile();
            echo "<br>";
    echo "Linija: ".$ex->getLine();
}