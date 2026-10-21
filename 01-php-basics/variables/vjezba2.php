<?php

echo "<h1>Tipovi podataka</h1>";


echo "<h2>Cijeli brojevi</h2>";

//integer
$broj=10;
echo "<br>Broj: ".$broj;

echo "<br>";
var_dump($broj);

//string
$ime="Pero";
echo "<br>";
var_dump($ime);


//float
$cijena=24.32;
echo "<br>";
var_dump($cijena);

//boolean
$istina=true;
echo "<br>";
var_dump($istina);

//array
$imena = ["Ivan",5,"Marko"];
echo "<br>";
var_dump($imena);

$a=5;
$b="5";
echo "<br>";
var_dump($a);
echo "<br>";
var_dump($b);
$c=(int)$b;
echo "<br>";
var_dump($c);

echo "<h2>Zapisi integera</h2>";
$decimal=123;
$octal=0123;
$hex=0x123;

echo "<br>Decimal: ".$decimal;
echo "<br>Octal: ".$octal;
echo "<br>Heksadecimal: ".$hex;

echo "<h2>Hiperlinkovi u PHP-u</h2>";

# 1. način
echo "<p><a href='vjezba1.php'>Link na vježba 1</a></p>";
echo '<p><a href="vjezba1.php">Link na vježba 1</a></p>';

?>