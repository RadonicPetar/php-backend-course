<?php

$datoteka = __DIR__."/knjige.json";

if(file_exists($datoteka)){
    $knjigeJSON=file_get_contents($datoteka);
    $knjige=json_decode($knjigeJSON,true);
}
else
    {
        $knjige=[];
    }


$knjige[]=[
    "naziv"=>"PHP programiranje",
    "autor"=>"Oliver Code",
    "stranice"=>252,
    "godina"=>2022,
    "datumzapis"=>date("Y-m-d H:i:s")
];

// $knjige[]=[
//     "naziv"=>"Napredno programiranje",
//     "autor"=>"Oliver Code",
//     "stranice"=>202,
//     "godina"=>2023
// ];

$knjigeJSON = json_encode($knjige,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);//pretvorba prije zapisa
$zapisi = file_put_contents($datoteka,$knjigeJSON);

if($zapisi){
    echo "\nUspješan zapis";
}

?>