<?php

/*
potrebno je napraviti program koji upisuje ime i prezime studenta, zatim broj ocjena za upis.
potrebno je omogućiti unos svake ocjene do unesenog broja, te nakon unesenih ocjena potrebno je izračunati prosjek.
ukoliko se unutar ocjena nalazi ijedna ocjena 1, potrebno je ispisati da je Student pao ispite.

DODATAK: osigurati unos ocjena samo između 1 i 5
*/

$ime_prezime=readline("Unesite ime i prezime: ");
$broj_ocjena = (int)readline("Unesite broj ocjena: ");

$ocjene=array();
for($broj=1;$broj<=$broj_ocjena;$broj++){
    $ocjena=(int)readline("Unesite {$broj}. ocjenu: ");

    if($ocjena < 1 || $ocjena > 5){
        echo "\neispravna ocjena!";
        $broj--;
        continue;
    }

    $ocjene[]=$ocjena;
}

if(in_array(1,$ocjene)){
    echo "\nStudent je pao";
}
else
    {
        $suma=0;
        foreach($ocjene as $ocj):
            $suma+=$ocj;
        endforeach;

        echo "\nProsjek studenta {$ime_prezime}: ".($suma/count($ocjene));
    }


?>