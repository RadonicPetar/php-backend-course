<?php

$recenica = "PHP je odlican jezik za Web Programiranje";
//           0123456789..............................n
//koliko je velik string?
$duljina = strlen($recenica);

echo "\nDuljina stringa: ".$duljina.PHP_EOL;

$prviznak=substr($recenica,0,1);
echo "\nPrvi znak: ".$prviznak.PHP_EOL;

$drugiznak=substr($recenica,1,1);
echo "\nDrugi znak: ".$drugiznak.PHP_EOL;

$prvadva=substr($recenica,0,2);
echo "\nPrva dva znaka: ".$prvadva.PHP_EOL;

echo "\nSvi znakovi:\n";
for($a=0;$a<strlen($recenica);$a++){
    $znak=substr($recenica,$a,1);
    echo "\nZnak: ".$znak;
}

echo "\nVELIKA SLOVA:\n";
echo strtoupper($recenica);

echo "\nmala slova:\n";
echo strtolower($recenica);

//izbrojati koliko u recenici imamo velikih slova, a koliko malih?
echo "\nKoliko velikih i malih slova?\n";
$velikih=$malih=0;
$razmaci=0;
for($a=0;$a<strlen($recenica);$a++){
    $znak=substr($recenica,$a,1);

    if($znak!=" "){

        if($znak==strtoupper($znak)){
            $velikih++;
        }
        else
        {
            $malih++;
        }
    }
    else{
        $razmaci+=1;
    }

}
echo "\nVelikih slova: {$velikih}".PHP_EOL;
echo "\nMalih slova: {$malih}".PHP_EOL;
echo "\nBroj riječi: ".($razmaci+1).PHP_EOL;

echo "\nBroj samoglasnika u rečenici:\n";
$samoglasnici=0;
for($a=0;$a<strlen($recenica);$a++){
    $znak=substr(strtolower($recenica),$a,1);
    if($znak=="a" || $znak=="e" || $znak=="i" || $znak=="o" || $znak=="u"){
        $samoglasnici++;
    }
}

echo "\nSamoglasnici: {$samoglasnici}".PHP_EOL;

echo "\nPozicija znaka W u rečenici:\n";
$pozicijaW = strpos($recenica,"W",0);
echo "\nPozicija od W je: {$pozicijaW}".PHP_EOL;
?>
