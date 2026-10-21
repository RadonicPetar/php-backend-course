<?php

$datoteka = __DIR__."/knjige.json";

if(file_exists($datoteka)){
    $knjigeJSON=file_get_contents($datoteka);
}

$knjige = json_decode($knjigeJSON,true);

print_r($knjige);

echo "\nČitanje JSON-a\n";

foreach($knjige as $knjiga){

    echo "\nNaziv knjige: ".$knjiga["naziv"];
    echo "\nAutor knjige: ".$knjiga["autor"];
    echo "\nStranice knjige: ".$knjiga["stranice"];
    echo "\nGodina knjige: ".$knjiga["godina"];
    echo "\nDatum zapisa: ".date("d.m.Y H:i:s",strtotime($knjiga["datumzapis"]));
    echo "\n========================================";

}

?>