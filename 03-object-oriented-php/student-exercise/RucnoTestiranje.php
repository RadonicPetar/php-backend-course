<?php

require_once "model/Student.php";
require_once "model/Ispit.php";
require_once "model/StudentIspit.php";

$student1 = new Student();
$student1->setIme("Marko");
$student1->setPrezime("Maric");
$student1->setJmbag("S001");
$student1->setGodinaStudija(2);
$student1->spremi();

$student2 = new Student();
$student2->setIme("Ana");
$student2->setPrezime("Anic");
$student2->setJmbag("S002");
$student2->setGodinaStudija(3);
$student2->spremi();

$ispit1=new Ispit();
$ispit1->sifra="P001";
$ispit1->setNaziv("PHP Osnove");
$ispit1->setDatum("2026-05-11");
$ispit1->spremi();

$ispit2=new Ispit();
$ispit2->sifra="P002";
$ispit2->setNaziv("MySQL Osnove");
$ispit2->setDatum("2026-05-15");
$ispit2->spremi();

$ispit3=new Ispit();
$ispit3->sifra="P003";
$ispit3->setNaziv("JavaScript Osnove");
$ispit3->setDatum("2026-05-25");
$ispit3->spremi();

$prijava1=new StudentIspit();
$prijava1->prijavi("S001","P001");

$prijava2=new StudentIspit();
$prijava2->prijavi("S002","P002");

$prijava3=new StudentIspit();
$prijava3->prijavi("S002","P003");

echo "Podaci spremljeni!";

$studentObj = new Student();
$studenti = $studentObj->dohvatiSve();

$ispitObj = new Ispit();
$ispiti = $ispitObj->dohvatiSve();

$prijavaObj = new StudentIspit();
$prijave = $prijavaObj->dohvatiSve();

echo "<h2>Prijave ispita</h2>";

foreach($prijave as $prijava){

    $studentPodaci=null;
    $ispitPodaci=null;

    foreach($studenti as $student){
        if($student["jmbag"]==$prijava["jmbag"]){
            $studentPodaci=$student;
            break;
        }
    }

    foreach($ispiti as $ispit){
        if($ispit["sifra"]==$prijava["sifra_ispita"]){
            $ispitPodaci=$ispit;
            break;
        }
    }

    if($studentPodaci && $ispitPodaci){
        echo "<br><b>Student:</b> ".$studentPodaci["ime"]." ".$studentPodaci["prezime"];
        echo "<br><b>JMBAG:</b> ".$studentPodaci["jmbag"];
        echo "<br><b>Ispit:</b> ".$ispitPodaci["naziv"];
        echo "<br><b>Datum:</b> ".date("d.m.Y",strtotime($ispitPodaci["datum"]));
        echo "<br><hr>";
    }


}