<?php


echo "OSNOVNA FUNKCIJA".PHP_EOL;

function ispis(){
    echo "\nJa sam funkcija";
}

ispis();
ispis();

echo "Pozovi funkciju 10 puta".PHP_EOL;

for($a=1;$a<=10;$a++){
    ispis(); echo " pozvana {$a}. put";
}

echo "\nOSNOVNA FUNKCIJA SA LOKALNOM VARIJABLOM".PHP_EOL;

function Lokalna(){
    $a = 10;
    $b = 5;
    $c = $a + $b;
    echo "\nRezultat je: ".$c;
    $d=sqrt($c);
    echo "\nKorijen je: ".$d;
}

Lokalna();

echo "\nFUNKCIJA SA GLOBALNOM VARIJABLOM".PHP_EOL;

$kolicina=100;
echo "\nKoličina je: ".$kolicina;

function Ukupno(){
    global $kolicina;
    $cijena = 15;
    $ukupno = $kolicina*$cijena;
    echo "\nUkupno je: ".$ukupno;
    $kolicina*=2;
}

Ukupno();
echo "\nKoličina je: ".$kolicina;

function brojac(){
    static $brojac = 0;
    $brojac++;
    echo "\nFunkcija brojac pozvana {$brojac} puta!";
}

brojac();
brojac();
brojac();
brojac();

echo "\nFUNKCIJA SA PARAMETRIMA - 1 PARAMETAR".PHP_EOL;

$x=25;

function Korijen($x){
    $korijen = round(sqrt($x),3);
    echo "\nKorijen broja {$x} je: ".$korijen;
}

Korijen($x);
Korijen(36);
echo "\nFUNKCIJA SA PARAMETRIMA - 1 PRIMJER".PHP_EOL;
//za 10 slučajnih brojeva u rasponu od 100 do 999 izračunati korijen koristeći gotovu funkciju Korijen
for($m=1;$m<=10;$m++){
    $broj=rand(100,999);
    Korijen($broj);
}

echo "\nFUNKCIJA SA PARAMETRIMA - VIŠE PARAMETARA".PHP_EOL;

function ZbrojiBrojeve($x1,$x2){
    $zbroj=$x1+$x2;
    echo "\nZbroj brojeva {$x1} i {$x2} je: ".$zbroj;
}

ZbrojiBrojeve(100,200);

function OpsegTrokuta($a=3,$b=4,$c=5){
    $opseg=$a+$b+$c;
    echo "\nOpseg trokuta je: ".$opseg;
}

OpsegTrokuta(7,11,15);

echo "\nFUNKCIJA KOJA VRAĆA VRIJEDNOST".PHP_EOL;

function ParnostBroja($br){

    if($br%2==0){
        return true;
    }
    else
    {
        return false;
    }
}

echo "\nBroj 5 je paran: ";
var_dump(ParnostBroja(5));

echo "\nBroj 10 je paran: ";
var_dump(ParnostBroja(10));

function VratiKorijen($var){
    return sqrt($var);
}

for($a=1;$a<=10;$a++){
    echo "\nKorijen broja {$a} je: ".VratiKorijen($a);
}

function SlozenostBroja($brojka){

    $djelitelji=0;
    for($b=1;$b<=$brojka;$b++){
        if($brojka%$b==0){
            $djelitelji++;
        }
    }

    return $djelitelji>2 ? " - složen" : " - prost";
}

$brojka=rand(1,20);
echo "\nSlozenost broja ".$brojka." je: ".SlozenostBroja($brojka);

?>