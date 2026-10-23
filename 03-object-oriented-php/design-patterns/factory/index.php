<?php

require_once "bootstrap.php";

use Factory\Factories\StudentFactory;
use Factory\Factories\AutoFactory;
use Factory\Factories\UserFactory;

echo "<h2>Primjer 1</h2>";

$student = StudentFactory::create("Marko","redovni");
echo "<br>".$student->getIme();
echo "<br>".$student->info();

$student = StudentFactory::create("Ana","izvanredni");
echo "<br>".$student->getIme();
echo "<br>".$student->info();

try{
    $stud2 = StudentFactory::create("A","redovni");
}
catch(Exception $ex){
    echo "<br>".$ex->getMessage();
}

echo "<h3>Novo kreiranje studenata</h3>";
try {
    $s1 = StudentFactory::create("Tomo","redovni");
    $s2 = StudentFactory::create("Milena","izvanredni");
    $s3 = StudentFactory::create("Andro","srednji");
} catch (Exception $ex) {
    echo $ex->getMessage();
}

echo "<h2>Primjer 2</h2>";

$a1 = AutoFactory::createBMW();
$a2 = AutoFactory::createAudi();

echo $a1->getMarka()."<br>";
echo $a2->getMarka()."<br>";

$autorand = AutoFactory::createRandomCar();
echo $autorand->getMarka();

echo "<h2>Primjer 3</h2>";
try {
    $u1 = UserFactory::create("admin","Ana");
    $u2 = UserFactory::create("korisnik","Marko");

    echo $u1->info()."<br>";
    echo $u2->info();
} catch (Exception $ex) {
    echo $ex->getMessage();
}
