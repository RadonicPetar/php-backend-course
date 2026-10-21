<?php

$auto = "BMW";
echo "\nJa volim auto: ".$auto;

$auto = "AUDI";
echo "\nJa volim auto: ".$auto;

$auti = array("BMW","AUDI","KIA","Mercedes","Škoda","Opel","Golf");
  //indexi      0      1     2       3         4       5     6
  //indeks,ključ,pozicija => sve isto

echo "\nJa volim auto: ".$auti[1];
echo "\nJa volim auto: ".$auti[5];

echo "\nSTRUKTURA NIZA\n";
print_r($auti);
var_dump($auti);

$duljina = count($auti);//sizeof($auti);
echo "\nDuljina niza: ".$duljina;

echo "\nISPIS NIZA PREKO FOR PETLJE\n";
for($a=0;$a<sizeof($auti);$a++){
    echo "\nElement niza: ".$auti[$a];
}

$auti[] = "Fiat";

echo "\nSTRUKTURA NIZA\n";
print_r($auti);

echo "\nISPIS NIZA PREKO FOR PETLJE\n";
for($a=0;$a<sizeof($auti);$a++){
    echo "\nElement niza: ".$auti[$a];
}

array_push($auti,"Hyundai","Citroen");

echo "\nSTRUKTURA NIZA\n";
print_r($auti);

echo "\nISPIS NIZA PREKO FOR PETLJE\n";
for($a=0;$a<sizeof($auti);$a++){
    echo "\nElement niza: ".$auti[$a];
}

//maknuti 4. element iz niza:
unset($auti[4]);
echo "\nSTRUKTURA NIZA\n";
print_r($auti);

echo "\nISPIS NIZA PREKO FOR PETLJE\n";
for($a=0;$a<sizeof($auti);$a++){
    if(array_key_exists($a,$auti)){
        echo "\nElement niza: ".$auti[$a];
    }
}

echo "\nISPIS NIZA PREKO FOREACH PETLJE - VRIJEDNOSTI\n";
foreach($auti as $auto){
    echo "\nElement niza foreach: ".$auto;
}

echo "\nISPIS NIZA PREKO FOREACH PETLJE - KLJUČEVI I VRIJEDNOSTI\n";
foreach($auti as $k=>$auto){
    echo "\nElement niza foreach: kljuc: ".$k." => vrijednost: ".$auto;
}

function IspisNiza($niz){
    echo "\nSTRUKTURA NIZA\n";
    print_r($niz);
    echo "\nDuljina niza: ".count($niz);
    echo "\nISPIS NIZA PREKO FOREACH PETLJE - KLJUČEVI I VRIJEDNOSTI\n";
    foreach($niz as $key=>$val){
        echo "\nElement niza: kljuc: ".$key." => vrijednost: ".$val;        
    }
    echo "\n========================================================\n";
}

IspisNiza($auti);
$gradovi[]="Zagreb";
$gradovi[]="Split";
$gradovi[]="Rijeka";
$gradovi[]="Osijek";
$gradovi[]="Dubrovnik";
IspisNiza($gradovi);
array_push($gradovi,"Pula","Makarska","Karlovac");
IspisNiza($gradovi);


?>