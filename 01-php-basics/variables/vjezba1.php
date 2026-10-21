<?php

$grad = "Zagreb";

echo "<p>Grad je $grad</p>";
echo '<p>Grad je $grad</p>';

$br_stanovnika=780000;

echo "<br>Grad $grad ima $br_stanovnika stanovnika";
echo "<br>Grad ".$grad." ima ".$br_stanovnika." stanovnika";

$broj1=20;
$broj2=30;

echo "<br>Zbroj ($broj1 i $broj2) je ($broj1+$broj2)";
echo "<br>Zbroj ($broj1 i $broj2) je ".($broj1+$broj2);
echo "<br>Zbroj ($broj1 i $broj2) je ".($broj1+$broj2)." i to je točan rezultat";

//jedna linija komentara
/*
početak komentara bloka
bolk1
blok2
blok3
kraj komentara bloka
*/

# komentar
$broj3="30";
$broj4="50";
echo "<br>Novi zbroj: ".($broj3+$broj4);

$brojka = 10;
echo "<br>Brojka iznosi: ".$brojka;
$temp = $brojka;
$brojka = 20;
echo "<br>Brojka iznosi: ".$brojka;
echo "<br>Brojka prije prepisivanja iznosila je: ".$temp;

# 2. način
echo "<p><a href=\"vjezba2.php\">Link na vježba 2</a></p>";
echo '<p><a href=\'vjezba2.php\'>Link na vježba 2</a></p>';
?>