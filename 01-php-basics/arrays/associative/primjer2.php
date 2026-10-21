<?php

/*
potrebno je omogućiti unos broja studenata. Nakon toga, potrebno je omogućiti 
unos imena studenta i njegove ocjene te ih spremati u asocijativni niz gdje će kljuc biti ime studenta, a vrijednost ocjena.
nakon završetka unosa, potrebno je ispisati prosjek ocjena svih studenata,
te ispisati koliko ima onih studenata čija je ocjena veća od prosjeka.
*/

$broj_stud = (int)readline("Unesite broj studenata: ");

$predmeti=array();
for($i=1;$i<=$broj_stud;$i++){
    $ime=readline("Unesite ime {$i}. studenta: ");
    $ocjena = (int)readline("Unesite ocjenu za {$i}. studenta: ");
    $predmeti[$ime]=$ocjena;
}

$prosjek = array_sum($predmeti)/count($predmeti);
echo "\nProsjek: ".$prosjek;

$veciodprosjeka=0;
foreach($predmeti as $stud=>$ocj){
    if($ocj>$prosjek){
        $veciodprosjeka++;
    }
}

echo "\nBroj studenata čija je ocjena veća od prosjeka: {$veciodprosjeka}";

/*
potrebno je omogućiti unos broja gradova sa iznosima prosječnih plaća za svaki grad.
nakon što završi unos, potrebno je izračunati ukupan iznos svih plaća za gradove
koji počinju sa slovom B.
Zatim je potrebno gradove čija je prosječna plaća manja od prosjeka plaća svih unesenih gradova
izdvojiti u novi indeksirani niz pod nazivom $socijalnigradovi.
Nakon toga, potrebno je svim gradovima čija prosječna plaća je ispod 2000 povećati istu za 30% te natrag
spremiti vrijednost.
Zadatak staviti na git i poslati link ili invitation.
*/


?>