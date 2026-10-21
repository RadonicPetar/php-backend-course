<?php

echo "\nPRIMJERI FUNKCIJA".PHP_EOL;
    /*
    potrebno je napraviti funkciju kojoj ćemo za prosljeđeni datum vratiti naziv dana 
    na hrvatskom jeziku
    */

 function VratiDanZaDatum($datum){

    $danENG = date("l",strtotime($datum));

     switch($danENG){

        case "Monday":
        $danCRO="Ponedjeljak";
        break;
        case "Tuesday":
        $danCRO="Utorak";
        break;
        case "Wednesday":
        $danCRO="Srijeda";
        break;
        case "Thursday":
        $danCRO="Četvrtak";
        break;
        case "Friday":
        $danCRO="Petak";
        break;
        case "Saturday":
        $danCRO="Subota";
        break;
        case "Sunday":
        $danCRO="Nedjelja";
        break;
    }

    return $danCRO;
 }
 
 echo "\nDan za datum 15.04.2019 je bio: ".VratiDanZaDatum("15.04.2019");

 /*
napraviti funkciju za generiranje slučajnog datuma koja će primati kao parametar godinu od koje datum može krenuti
do današnje
 */

function GenerirajSlucajniDatum($pocetnaGod){

    $gg = rand($pocetnaGod,date("Y"));
    $mm = rand(1,12);

    if($mm==2){

        if($gg%4==0){
            $dd=rand(1,29);
        }
        else
        {
            $dd=rand(1,28);
        }
    }
    elseif($mm==1 || $mm==3 || $mm==5 || $mm==7 || $mm==8 || $mm==10 || $mm==12){
        $dd=rand(1,31);
    }
    else
    {
        $dd=rand(1,30);
    }

    if($mm<=9){
        $mm="0".$mm;
    }

    if($dd<=9){
        $dd="0".$dd;
    }

    return $dd.".".$mm.".".$gg;
}

$slucDatum = GenerirajSlucajniDatum(2000);

 echo "\nDan za datum {$slucDatum} je bio: ".VratiDanZaDatum($slucDatum);

 //generirati 10 slucajnih datuma sa pocetnom godinom 1970, te ukoliko dan iz datuma bude veći od polovice mjeseca,
 //ispisati dan, te napraviti prekid petlje

 for($m=1;$m<=10;$m++){
    $datum = GenerirajSlucajniDatum(1970);
    echo "\nDan za datum {$datum} je bio: ".VratiDanZaDatum($datum);
    $dd=date("d",strtotime($datum));
    if((int)$dd>15){
        echo "\nDan: ".$dd;
        break;
    }
 }
?>