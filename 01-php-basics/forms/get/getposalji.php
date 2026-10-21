<!DOCTYPE html>
<html>
    <head>
        <title>GET pošalji</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php

    $metoda = $_SERVER['REQUEST_METHOD'];
    echo "<label>Metoda: {$metoda}</label>";

    echo "<p>GET array</p>";
    print_r($_GET);

    if(isset($_GET["FormaGet"])){
         echo "<label>Došao sa forme</label>";
    }
    else
    {
        echo "<label>Došao sa linka</label>";
    }

    echo "<label>Poslano ".count($_GET)." GET varijabli!</label>";

    $ime=$_GET["ime"];
    echo "<label class='post'>Ime: {$ime}</label>";

    $godine=$_GET["godine"];

    if(!empty($godine)){
        echo "<label class='post'>Godine: {$godine}</label>";
    }
    else
    {
        echo "<label class='greska'>Godine su prazne!</label>";
    }

    if(isset($_GET["placa"])){
        $placa=$_GET["placa"];
        echo "<label class='post'>Plaća: {$placa}</label>";
    }


    echo "<label class='post'>Query string: ".$_SERVER['QUERY_STRING']."</label>";

    ?>

    <p><a href="getmetoda.php">Ponovno</a></p>
    </body>
</html>