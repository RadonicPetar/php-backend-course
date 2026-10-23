<?php

class Proizvod{
    public float $cijena;
}

$proizvod = new Proizvod();
$proizvod->cijena = -100;

echo $proizvod->cijena;