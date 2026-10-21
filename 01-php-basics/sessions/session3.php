<!DOCTYPE html>
<html>
    <head>
        <title>SESSIONS</title>
    </head>
    <body>
    <h1>SESSIONS 3</h1>

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
    if(isset($_SESSION["sifra"])){
        echo "<p>Session sifra var: ".$_SESSION["sifra"]."</p>";
    }
    
    if(isset($_SESSION["vrijeme1"])){
        echo "<p>Vrijeme izvršavanja skripte session1: ".$_SESSION["vrijeme1"]."</p>";
    }
    if(isset($_SESSION["vrijeme2"])){
        echo "<p>Vrijeme izvršavanja skripte session2: ".$_SESSION["vrijeme2"]."</p>";
    }
    $_SESSION["vrijeme3"]=date("d.m.Y H:i:s");
    echo "<p>Vrijeme izvršavanja skripte session3: ".$_SESSION["vrijeme3"]."</p>";

    if(isset($_SESSION["vrijeme2"]) && isset($_SESSION["vrijeme3"])){
        $razlika = strtotime($_SESSION["vrijeme3"])-strtotime($_SESSION["vrijeme2"]);
        echo "<p>Razlika vremena između session2 i session3 je: ".$razlika;
        $sati = floor($razlika/3600);
        $minute = floor(($razlika%3600)/60);
        $sekunde_ostatak = $razlika % 60;
        echo "<br>U vremenu: {$sati}:{$minute}:{$sekunde_ostatak}";
    }

    echo "<h2>Link na druge skripte</h2>";

    echo "<p><a href='session1.php'>Prva</a></p>";
    echo "<p><a href='session2.php'>Druga</a></p>";

    ?>
    
    </body>
</html>