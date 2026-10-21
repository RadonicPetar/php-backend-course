<!DOCTYPE html>
<html>
    <head>
        <title>SESSIONS</title>
    </head>
    <body>
    <h1>SESSIONS 2</h1>

    <?php

    $scriptName = basename($_SERVER["SCRIPT_NAME"]);

    echo "<p>Nalazimo se u skripti: ".$scriptName."</p>";

    echo "<p>Session ID: ".session_id()."</p>";
    if(session_id()==""){
        session_start();
    }
    echo "<p>Session ID: ".session_id()."</p>";

    echo "<h2>Definicija varijabli</h2>";

    if(isset($_SESSION["ime"])){
        echo "<p>Session ime var: ".$_SESSION["ime"]."</p>";
    }
    
    $_SESSION["sifra"]=1000;
    echo "<p>Session sifra var: ".$_SESSION["sifra"]."</p>";

    if(isset($_SESSION["vrijeme1"])){
    echo "<p>Vrijeme izvršavanja skripte session1: ".$_SESSION["vrijeme1"]."</p>";
    }
    $_SESSION["vrijeme2"]=date("d.m.Y H:i:s");
    echo "<p>Vrijeme izvršavanja skripte session2: ".$_SESSION["vrijeme2"]."</p>";

    if(isset($_SESSION["vrijeme1"]) && isset($_SESSION["vrijeme2"])){
        $razlika = strtotime($_SESSION["vrijeme2"])-strtotime($_SESSION["vrijeme1"]);
        echo "<p>Razlika vremena između session1 i session2 je: ".$razlika;
    }

    echo "<h2>Link na druge skripte</h2>";

    echo "<p><a href='session1.php'>Prva</a></p>";
    echo "<p><a href='session3.php'>Treća</a></p>";

    ?>
    
    </body>
</html>