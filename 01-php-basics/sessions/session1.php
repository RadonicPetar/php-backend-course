<!DOCTYPE html>
<html>
    <head>
        <title>SESSIONS</title>
    </head>
    <body>
    <h1>SESSIONS 1</h1>

    <?php

    $scriptName = basename($_SERVER["SCRIPT_NAME"]);

    echo "<p>Nalazimo se u skripti: ".$scriptName."</p>";

    echo "<p>Session ID: ".session_id()."</p>";
    if(session_id()==""){
        session_start();
    }
    echo "<p>Session ID: ".session_id()."</p>";

    echo "<h2>Definicija varijabli</h2>";

    $_SESSION["ime"]="Tamara";
    echo "<p>Session ime var: ".$_SESSION["ime"]."</p>";

    $_SESSION["vrijeme1"]=date("d.m.Y H:i:s");
    echo "<p>Vrijeme izvršavanja skripte session1: ".$_SESSION["vrijeme1"]."</p>";

    echo "<h2>Link na druge skripte</h2>";

    echo "<p><a href='session2.php'>Druga</a></p>";
    echo "<p><a href='session3.php'>Treća</a></p>";

    echo "<h2>Pokrenute sessije</h2>";

    foreach($_SESSION as $key=>$val){
        echo "<p>Ključ: {$key} => Vrijednost: {$val}</p>";
    }

    echo "<h2>Uništavanje sessije</h2>";

    echo "<p><a href='?unisti=1'>Uništi sessiju</a></p>";

    if(isset($_GET["unisti"])){
        session_destroy();
        echo "<p>Sessija uništena!</p>";
    }

    ?>
    
    </body>
</html>