<?php

try{
    if(!file_exists("podaci.json")){
        throw new RuntimeException("Datoteka ne postoji");
    }
    $data = file_get_contents("podaci.json",true);
    print_r($data);
}
catch(RuntimeException $re){
    echo "<br>Greška: ".$re->getMessage();
    echo "<br>Code: ".$re->getCode();
}