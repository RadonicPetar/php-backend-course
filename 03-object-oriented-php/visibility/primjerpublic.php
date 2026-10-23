<?php

class Auto{
    public string $naziv;
    public float $cijena;
}

$auto = new Auto();
$auto->naziv = "Fiat";
$auto->cijena = 5900;
echo $auto->naziv.", ".$auto->cijena;