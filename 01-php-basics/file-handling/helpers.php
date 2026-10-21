<?php

function UnosPodataka(){

    global $putanja;

    $broj_pr = (int)readline("Unesite broj proizvoda: ");
    for($i=1;$i<=$broj_pr;$i++){
        echo "\nUnos podataka za {$i} proizvod:\n";
        $sifra=readline("Unesite šifru: ");
        $naziv=readline("Unesite naziv: ");
        $kolicina=(int)readline("Unesite količinu: ");
        $cijena=(float)readline("Unesite cijenu: ");

        if(file_exists($putanja)){
            $proizvodiJSON = file_get_contents($putanja);
            $proizvodi=json_decode($proizvodiJSON,true);
        }
        else
        {
            $proizvodi=[];
        }

        $proizvodi[$sifra]=[
            "naziv"=>$naziv,
            "kolicina"=>$kolicina,
            "cijena"=>$cijena
        ];

        $proizvodiJSON=json_encode($proizvodi,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        $zapisi=file_put_contents($putanja,$proizvodiJSON);

        if($zapisi){
            echo "\nZapis uspješno pospremljen na ".$putanja;
        }
    }
}

function IspisPodataka(){

    global $putanja;
    if(!file_exists($putanja)){
        $proizvodi=[];
    }
    else
    {
        $proizvodiJSON = file_get_contents($putanja);
        $proizvodi=json_decode($proizvodiJSON,true);
    }

    foreach($proizvodi as $sifra=>$podaci){
        echo "\nŠifra: ".$sifra;
        echo "\nNaziv: ".$podaci["naziv"];
        echo "\nKoličina: ".$podaci["kolicina"];
        echo "\nCijena: ".$podaci["cijena"];
        $ukupno = $podaci["kolicina"]*$podaci["cijena"];
        echo "\nUkupno: ".number_format($ukupno,2,",",".")." €";
        echo "\n=========================";
    }

}

function PretragaPodataka($sifraUnos){
        global $putanja;
        if(!file_exists($putanja)){
            $proizvodi=[];
        }
        else
        {
            $proizvodiJSON = file_get_contents($putanja);
            $proizvodi=json_decode($proizvodiJSON,true);
        }

        if(array_key_exists($sifraUnos,$proizvodi)){
            echo "\nProizvod pronađen: \n";
            foreach($proizvodi as $sifra=>$podaci):
                if($sifra==$sifraUnos):
                    echo "\nŠifra: ".$sifra;
                    echo "\nNaziv: ".$podaci["naziv"];
                    echo "\nKoličina: ".$podaci["kolicina"];
                    echo "\nCijena: ".$podaci["cijena"];
                    $ukupno = $podaci["kolicina"]*$podaci["cijena"];
                    echo "\nUkupno: ".number_format($ukupno,2,",",".")." €";
                endif;

            endforeach;
        }
        else
            {
                echo "\nProizvod nije pronađen!";
            }

}

?>