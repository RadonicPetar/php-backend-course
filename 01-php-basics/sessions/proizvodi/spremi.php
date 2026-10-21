<?php

session_start();

$slikaIme = $_FILES["slika"]["name"];
$tmp=$_FILES["slika"]["tmp_name"];

$putanja=__DIR__."/slike";
if(!is_dir($putanja)){
    mkdir($putanja);
}

move_uploaded_file($tmp,$putanja."/".$slikaIme);

$proizvod= [
    "id"=>$_POST["id"],
    "naziv"=>$_POST["naziv"],
    "kolicina"=>$_POST["kolicina"],
    "cijena"=>$_POST["cijena"],
    "slika"=>$slikaIme
];

$_SESSION["proizvodi"][]=$proizvod;

header("Location: index.php");
exit();

?>