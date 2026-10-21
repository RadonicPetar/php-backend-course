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

array_push($gradovi,"Vukovar","Vinkovci");
IspisNiza($gradovi);

array_shift($gradovi);
IspisNiza($gradovi);
array_unshift($gradovi,"Omiš","Makarska");
IspisNiza($gradovi);

$brojevi[]=34;
$brojevi[]=27;
$brojevi[]=17;
$brojevi[]=42;
$brojevi[]=54;
$brojevi[]=23;
$brojevi[]=12;
$brojevi[]=39;
IspisNiza($brojevi);
/*
Potrebno je:
- pronaći najmanji element niza
- pronaći najveći element niza
- pronaći prosječnu vrijednost
- zbrojiti sve vrijednosti na neparnim pozicijama
- pronaći koliko imamo parnih elemenata
*/

echo "\na) najmanji element niza:\n";

$najmanji = $brojevi[0];
$najveci = $brojevi[0];
$suma=0;
$zbrojneparpoz=0;
$brojparnih=0;
foreach($brojevi as $key=>$val){

    if($val<$najmanji){
        $najmanji=$val;
    }

    if($val>$najveci){
        $najveci=$val;
    }

    if($key%2==1){
        $zbrojneparpoz+=$val;
    }

    if($val%2==0){
        $brojparnih++;
    }

    $suma+=$val;
}

echo "\n- najmanji element niza: ".$najmanji;
echo "\n- najveci element niza: ".$najveci;
$prosjek=$suma/count($brojevi);
echo "\n- prosječni element niza: ".$prosjek;
echo "\n- zbroj elemenata neparnih pozicija: ".$zbrojneparpoz;
echo "\n- broj parnih elemenata: ".$brojparnih;

echo "\nSortiranje niza - uzlazno:\n";

//34,27,17,42,54,23,12,39

for($i=0;$i<sizeof($brojevi);$i++){

    for($j=$i+1;$j<sizeof($brojevi);$j++){

        $temp=0;
        if($brojevi[$i]>$brojevi[$j]){
            $temp=$brojevi[$i];
            $brojevi[$i]=$brojevi[$j];
            $brojevi[$j]=$temp;
        }
    }
    echo "\nBroj: ".$brojevi[$i];
}

IspisNiza($brojevi);

echo "\nSortiranje niza - silazno:\n";

//34,27,17,42,54,23,12,39

for($i=0;$i<sizeof($brojevi);$i++){

    for($j=$i+1;$j<sizeof($brojevi);$j++){

        $temp=0;
        if($brojevi[$i]<$brojevi[$j]){
            $temp=$brojevi[$i];
            $brojevi[$i]=$brojevi[$j];
            $brojevi[$j]=$temp;
        }
    }
    echo "\nBroj: ".$brojevi[$i];
}

echo "\nGotove metode za sortiranje:\n";
echo "\nSortiranje niza - uzlazno po vrijednosti:\n";
sort($brojevi);
IspisNiza($brojevi);

echo "\nSortiranje niza - silazno po vrijednosti:\n";
rsort($brojevi);
IspisNiza($brojevi);

echo "\nSortiranje niza - uzlazno po indeksu (ključu):\n";
ksort($brojevi);
IspisNiza($brojevi);

echo "\nSortiranje niza - silazno po indeksu (ključu):\n";
krsort($brojevi);
IspisNiza($brojevi);

    /*
    zadana je rečenica: Moje ime je Davorin Bogovic i sve oko mene je crno bijeli svijet
    potrebno je rečenicu pretvoriti u niz, te ispisati svaku vrijednost. U produžetku ispisati
    koliko je svaka vrijednost velika (duljina), te ukoliko je veća od 5, ispisati 5 i više znakova, inače 
    ispisati manje od 5 znakova
    npr. Davorin => 7 => 5 i više znakova
    */

    $izraz="Moje ime je Davorin Bogovic i sve oko mene je crno bijeli svijet";
    $izraz_niz=explode(" ",$izraz);
    IspisNiza($izraz_niz);

    foreach($izraz_niz as $val){
        if(strlen($val)>=5){
            $info="5 i više znakova";
        }
        else
        {
            $info="Manje od 5 znakova";
        }

        echo "\n{$val} => ".strlen($val)." => ".$info;
    }

        /*
    potrebno je kreirati indeksirani niz sa 10 brojeva koji se ne smiju ponavljati (u rasponu od 10 do 99)
    provjeru postojanja duple vrijednosti napraviti pomoću funkcije provjeriduplog koja kao parametre prima niz i broj koji se provjerava
    ako funkcija vrati true, to je oznaka da postoji broj, u suprotnom vraća false (da ne postoji)
    */

    $brojke=array();
    $brojke[]=55;

    for($m=1;$m<=9;$m++){
        $broj=rand(10,99);
        $ima=ProvjeriDuplog($brojke,$broj);
        if(!$ima){
            $brojke[]=$broj;
        }
        else
            {
                $m--;
            }
    }

    function ProvjeriDuplog($brojke,$broj){

        foreach($brojke as $br){
            if($broj==$br){
                return true;
            }
        }
        return false;
    }

    IspisNiza($brojke);

    IspisNiza($gradovi);

    if(in_array("dfdf",$gradovi)){
        echo "Postoji Osijek u nizu gradovi";
    }
    else
        {
            echo "Ne postoji trazeni pojam";
        }

    $poz = array_search("Pula",$gradovi);
    echo "\nPozz Pula: ".$poz;
?>