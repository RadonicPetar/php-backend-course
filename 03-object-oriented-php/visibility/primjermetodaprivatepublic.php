<?php

class Racun
{
    private float $stanje = 0;

    public function uplati($iznos){
        if($this->ispravanIznos($iznos)){
            $this->stanje+=$iznos;
        }
    }

    private function ispravanIznos($iznos){
        return $iznos > 0;
    }

    public function prikaziStanje(): float{
        return $this->stanje;
    }
}

$racun = new Racun();
$racun->uplati(100);
$racun->uplati(-50);

echo $racun->prikaziStanje();