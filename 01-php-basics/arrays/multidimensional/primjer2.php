<?php

$studenti = [
    [
        "ime"=>"Ana",
        "prezime"=>"Anić",
        "ocjena"=>5
    ],
    [
        "ime"=>"Marko",
        "prezime"=>"Marić",
        "ocjena"=>4
    ],
    [
        "ime"=>"Ivan",
        "prezime"=>"Ivić",
        "ocjena"=>3
    ]
];

echo "\nPrvi student ime: ".$studenti[0]["ime"];
echo "\nDrugi student prezime: ".$studenti[1]["prezime"];
echo "\nTreci student ocjena: ".$studenti[2]["ocjena"];

echo "\nISPIS PREKO FOREACH PETLJE:\n"; 

foreach($studenti as $student){
    echo "\nStudent ime: ".$student["ime"];
    echo "\nStudent prezime: ".$student["prezime"];
    echo "\nStudent ocjena: ".$student["ocjena"];
    echo "\n====================================";
}

$maxOcjena=$studenti[0]["ocjena"];
$najboljiStudent=$studenti[0];

foreach($studenti as $student){

    if($student["ocjena"]>$maxOcjena){
        $maxOcjena=$student["ocjena"];
        $najboljiStudent=$student;
    }

}

echo "\nNajveću ocjenu ima ".$najboljiStudent["ime"]." ".$najboljiStudent["prezime"]." (".$maxOcjena.")";

echo "\nDA LI POSTOJI STUDENT POD IMENOM Ivan?:\n";

$pronadjen=false;

foreach($studenti as $student){
    if($student["ime"]=="Ivanko"){
        echo "\nPronađen student: ".$student["ime"];
        $pronadjen=true;
    }
}

if(!$pronadjen){
    echo "\nStudent nije pronađen!";
}

?>