<?php

class Kalkulator{

    public function Zbroji($a,$b){
        return $a+$b;
    }

    public function Pomnozi($a,$b){
        return $a*$b;
    }

}

$kalk = new Kalkulator();
echo $kalk->Zbroji(5,3);
echo "<br>";
echo $kalk->Pomnozi(5,3);