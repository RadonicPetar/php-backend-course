<?php

function IspisNiza($niz){
    echo "\n========================================================\n";
    echo "\nSTRUKTURA NIZA\n";
    print_r($niz);
    echo "\nDuljina niza: ".count($niz);
    echo "\nISPIS NIZA PREKO FOREACH PETLJE - KLJUČEVI I VRIJEDNOSTI\n";
    foreach($niz as $key=>$val){
        echo "\nElement niza: kljuc: ".$key." => vrijednost: ".$val;        
    }
    echo "\n========================================================\n";
}

$imena = array("Pero"=>45,"Dado"=>15,"Miro"=>50,"Ana"=>36,"Cico"=>29);
IspisNiza($imena);
$imena["Bobo"]=32;
IspisNiza($imena);

$key1=key($imena);
echo "\nPrvi ključ: ".$key1;

$val1=current($imena);
echo "\nPrva vrijednost: ".$val1;

/*
pronaći najstariju osobu i ispisato njeno ime i godine
*/

$maksime=key($imena);
$maksgod=current($imena);

foreach($imena as $ime=>$god){
    if($god>$maksgod){
        $maksgod=$god;
        $maksime=$ime;
    }
}

echo "\nNajstariji je {$maksime} i ima {$maksgod} godina!";

/*
ispisati današnji dan na hrvatskom jeziku preko asocijativnog niza $dani.
*/
$dani=array("Monday"=>"Ponedjeljak","Tuesday"=>"Utorak","Wednesday"=>"Srijeda",
    "Thursday"=>"Četvrtak",
    "Friday"=>"Petak",
    "Saturday"=>"Subota",
    "Sunday"=>"Nedjelja");

$currDay = date("l");
echo "\nDanas je: ".$dani[$currDay];

/*
zadan je asocijativni niz $osoba sa osobnim podacima. Ispisati koliko vrijednosti tog niza je numeričkih.
*/

$osoba = [
    "ime"=>"Pero",
    "prezime"=>"Perić",
    "godine"=>25,
    "placa"=>2578.32,
    "datum_rod"=>"1987-05-14",
    "visina"=>178.95
];

$brojNumVr=0;

foreach($osoba as $atribut=>$vrijednost){
    if(is_numeric($vrijednost)){
        $brojNumVr++;
    }
}

echo "\nNumeričkih vrijednosti imamo: {$brojNumVr}";

/*
    zadan je asocijativni niz vlasnika i njihovih automobila gdje je kljuc automobil a vrijednost vlasnik.
    potrebno je u novi asocijativni niz dodati koliko koji vlasnik posjeduje automobila tako da ce kljuc biti vlasnik, a vrijednost broj automobila koje on posjeduje
    npr ispis: Vlasnik Pero posjeduje 4 automobila
    */
    $auti["BMW"]="Pero";
    $auti["Audi"]="Mate";
    $auti["Kia"]="Ana";
    $auti["Golf"]="Pero";
    $auti["Mercedes"]="Miro";
    $auti["Opel"]="Pero";
    $auti["Honda"]="Mate";
    $auti["Toyota"]="Marko";
    $auti["Fiat"]="Bobo";
    $auti["Ford"]="Cico";
    $auti["Jetta"]="Pero";
    $auti["Jaguar"]="Bobo";
    $auti["Dacia"]="Robo";
    $auti["Renol"]="Zlatko";
    $auti["Suzuki"]="Pero";
    $auti["Hyundai"]="Bobo";
    $auti["Zastava"]="Miro";

    $vlasnici=array();

    foreach($auti as $key1=>$val1){

        $brojac=0;
        foreach($auti as $key2=>$val2){
            if($val1==$val2){
                $brojac++;
            }
        }
        $vlasnici[$val1]=$brojac;
    }

    arsort($vlasnici);

    foreach($vlasnici as $vlasnik=>$brauta){
        echo "\nVlasnik {$vlasnik} ima {$brauta} auta u vlasništvu!";
    }

    ksort($vlasnici);

    IspisNiza($vlasnici);

    krsort($vlasnici);

    IspisNiza($vlasnici);


?>