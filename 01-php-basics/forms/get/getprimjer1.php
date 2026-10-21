<!DOCTYPE html>
<html>
    <head>
        <title>GET metoda</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <h1>GET metoda - 1</h1>
<?php

/*
    potrebno je generirati abecedu slova (engl. alfabet) preko gotove funkcije range, te od svakog slova napraviti 
    klikabilni link koji kada se aktivira ispiše to slovo i nakon toga pozove funkciju koja vrati popis knjiga koje
    počinju sa tim slovom. Knjige se čitaju iz datoteke knjige.json. Ukoliko ne nađe nijednu knjigu, ispisati poruku: Ne postoji knjiga koja počinje s tim slovom
*/
$abeceda = range("A","Z");
//print_r($abeceda);
foreach($abeceda as $slovo){
    echo "<a href='?znak=$slovo'>$slovo</a>";
}

if(isset($_GET["znak"])){
    $znak=$_GET["znak"];
    echo "<label class='success'>Kliknuo na slovo: {$znak}</label>";
    ProcitajKnjige($znak);
}

function ProcitajKnjige($znak){

    $putanja = __DIR__."/storage/knjige.json";
    if(file_exists($putanja)){
        $knjigeJSON=file_get_contents($putanja);

        $knjige = json_decode($knjigeJSON,true);

        $brojac=0;
        foreach($knjige as $knjiga){
            $prvoslovo=substr($knjiga["naziv"],0,1);
            if($znak==$prvoslovo){
                echo "<label>Knjiga: ".$knjiga["naziv"]."</label>";
                $brojac++;
            }
        }

        if($brojac==0){
            echo "<label>Ne postoji knjiga za traženo slovo!</label>";
        }
    }

}
?>
    </body>
</html>