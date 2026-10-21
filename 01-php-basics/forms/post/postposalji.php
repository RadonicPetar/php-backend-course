<!DOCTYPE html>
<html>
    <head>
        <title>POST pošalji</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php
    include_once "sifarnici.php";
    $metoda = $_SERVER['REQUEST_METHOD'];
    echo "<label>Metoda: {$metoda}</label>";

    echo "<p>POST array</p>";
    print_r($_POST);

    echo "<label>Poslano ".count($_POST)." POST varijabli!</label>";

    $ime=$_POST["ime"];
    echo "<label class='post'>Ime: {$ime}</label>";

    $godine=$_POST["godine"];

    if(!empty($godine)){
        echo "<label class='post'>Godine: {$godine}</label>";
    }
    else
    {
        echo "<label class='greska'>Godine su prazne!</label>";
    }

    if(isset($_POST["grad"])){
        $grad=$_POST["grad"];
        if($grad!="-1"){
            echo "<label class='post'>Grad: {$gradovi[$grad]}</label>";
        }
        else
        {
            echo "<label class='greska'>Grad nije odabran!</label>";
        }
    }

    if(isset($_POST["spol"])){
        $spol=$_POST["spol"];
        echo "<label class='post'>Spol: ";
        $spolinfo = $spol=="m" ? "Muški" : "Ženski";
        echo $spolinfo;
        echo "</label>";
    }
    else
    {
        echo "<label class='greska'>Spol nije odabran!</label>";
    }

    if(isset($_POST["sport"])){
        $odbsportovi=$_POST["sport"];
        echo "<label class='post'>Sportovi: ";
        //print_r($odbsportovi);
        $sportovijoin="";
        foreach($odbsportovi as $poslano){
            echo $sportovi[$poslano].", ";
            $sportovijoin.=$sportovi[$poslano];
        }
        echo "</label>";
    }

    $putanja=__DIR__."/uploads";
    if(!is_dir($putanja)){
        mkdir($putanja);
    }

    $imeDat=$_FILES["datoteka"]["name"];

    if($imeDat!=""){

        $odredisnaDatoteka = $putanja."/".basename($_FILES["datoteka"]["name"]);
        
        $tmpDat = $_FILES["datoteka"]["tmp_name"];
        $tipDat = $_FILES["datoteka"]["type"];
        $velicinaDat = $_FILES["datoteka"]["size"];

        if(move_uploaded_file($tmpDat,$odredisnaDatoteka)){
            echo "<label class='success'>Uspješno postavljena datoteka na folder</label>";
            echo "<label class='success'>Tip datoteke: {$tipDat}</label>";
            echo "<label class='success'>Veličina datoteke: ".($velicinaDat/1024)." KB</label>";
        }

        if(file_exists($odredisnaDatoteka)){
            echo "<labe><img src='uploads/{$imeDat}'></label>";
        }
    }

    if(!empty($_POST["opis"])){
        $opis=$_POST["opis"];
        if(strlen($opis)>100){
            echo "<label class='greska'>Opis je predugačak!</label>";
        }
        else
        {
            echo "<label class='success'>Opis: ".$opis."</label>";
        }
    }
    else
    {
        echo "<label class='greska'>Opis je prazan</label>";
    }

    $postpath = __DIR__."/storage";
    if(!is_dir($postpath)){
        mkdir($postpath);
    }

    $postdatoteka=$postpath."/postpodaci.json";

    if(!file_exists($postdatoteka)){
        file_put_contents($postdatoteka,json_encode([]));
    }

    $podaci=json_decode(file_get_contents($postdatoteka),true);

    $id = !empty($podaci) ? max(array_column($podaci,'id'))+1 : 1;

    $podaci[]=[
        "id"=>$id,
        "ime"=>$ime,
        "godine"=>$godine,
        "grad"=>$gradovi[$grad],
        "spol"=>$spolinfo,
        "sportovi"=>$sportovijoin,
        "slika"=>"uploads/".$imeDat,
        "opis"=>$opis
    ];

    file_put_contents($postdatoteka,json_encode($podaci,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    ?>

    <p><a href="postmetoda.php">Ponovno</a></p>
    </body>
</html>