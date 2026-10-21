<!DOCTYPE html>
<html>
    <head>
        <title>SESSIONS</title>
    </head>
    <body>
    <h1>SESSIONS PRIMJER</h1>

    <?php
    /*
    potrebno je napraviti provjeru neaktivnosti sessije nakon 20 sekundi. Ukoliko se nije desila aktivnost na stranici
    unutar 20 sekundi, napraviti uništenje sessije, u suprotnom nastaviti sesiju.
    */

   session_start();
   
   $timeout=20;

   if(isset($_SESSION["zadnja_aktivnost"])){
        $neaktivnost = time()-strtotime($_SESSION["zadnja_aktivnost"]);

        if($neaktivnost>$timeout){
            session_destroy();
            echo "<p>Session istekao zbog neaktivnosti: {$neaktivnost}</p>";
            exit();
        }
   }

   $_SESSION["zadnja_aktivnost"]=date("d.m.Y H:i:s");
   echo "<br>Session aktivan. Refreshaj stranicu<br>";

    ?>
    
    </body>
</html>