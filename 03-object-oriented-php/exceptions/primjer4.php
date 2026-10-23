<?php

class Radnik{

    private string $ime;

    public function setIme(string $ime){
        if(strlen($ime)<2){
            throw new Exception("Ime mora imati min. 2 znaka",499);
        }
        if(substr($ime,0,1)==strtolower(substr($ime,0,1))){
            throw new Exception("Ime ne smije započeti malim slovom",498);
        }
        $this->ime = $ime;
    }
}

try{
    $r = new Radnik();
    $r->setIme("Pero");
}
catch(Exception $ex){
    echo "Greška kod postavljanja imena!";
    echo "<br>Detalji greške: ".$ex->getMessage().", ".$ex->getCode();
}