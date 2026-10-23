<?php

require_once "Student.php";
require_once "Profesor.php";

$student = new Student("Ana","Anic",2500,"S001");

$student->IspisiStudenta();


$profesor = new Profesor("Pero","Peric",4000,"Doc.dr.sc");

$profesor->IspisiProfesora();

$popis=[
    new Student("Lana","Lanic",1500,"S002"),
    new Student("Marko","Markic",1400,"S003"),
    new Profesor("Zvonko","Zvonic",2800,"prof.dr.sc"),
    new Profesor("Mila","Milic",4100,"mag.dr.sc"),
];

foreach($popis as $clan){
    echo $clan->IspisDetalja();
    echo "<hr>";
}