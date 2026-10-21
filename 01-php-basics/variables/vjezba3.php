<?php

echo "<h1>PREDEFINIRANE KONSTANTE u PHP-u</h1>";

echo "PHP verzija: ".PHP_VERSION.PHP_EOL;
echo "<br>Major verzija: ".PHP_MAJOR_VERSION.PHP_EOL;
echo "<br>Minor verzija: ".PHP_MINOR_VERSION.PHP_EOL;
echo "<br>PHP OS: ".PHP_OS.PHP_EOL;
echo "<br>Trenutni direktorij: ".__DIR__.PHP_EOL;
echo "<br>Trenutna dateoteka: ".__FILE__.PHP_EOL;
echo "<br>Broj linije: ".__LINE__.PHP_EOL;

echo "<h1>VLASTITE KONSTANTE u PHP-u</h1>";

define("PI",3.14);
echo PI;

define("BAZA","Fakulteti");
define("USER","faks01");
define("PASS","e23#1");
define("HOST","f1.foi.hr");

echo "<br>Baza je: ".BAZA;
?>