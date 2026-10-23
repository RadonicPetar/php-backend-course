<?php

class NegativeNumberException extends Exception
{
    private float $vrijednost;

    public function __construct(float $vrijednost){
        $this->vrijednost=$vrijednost;

        parent::__construct("Ne može se izračunati korijen negativnog broja: {$vrijednost}");
    }

    public function getVrijednost(): float{
        return $this->vrijednost;
    }
}

function kvadratniKorijen(float $broj): float{
    if($broj<0){
        throw new NegativeNumberException($broj);
    }
    return sqrt($broj);
}

try{
    echo "Računam korijen broja -4...<br>";
    echo "Rezultat: ".kvadratniKorijen(-4);
}
catch(NegativeNumberException $exp){
    echo "<br>Greška: ".$exp->getMessage();
    echo "<br>Vrijednost koja je uzrokovala grešku: ".$exp->getVrijednost();
}
finally{
    echo "<br>Kraj izračuna!";
}