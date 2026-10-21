<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>HTML stranica</title>
    </head>
    <body>
        <h1>Ovo je HTML statička stranica</h1>
        <p>Datum: 05.03.2026 18:45:26</p>
        <?php
        echo "<p>Nastavljam raditi u PHP-u</p>";
        echo "<br>Datum ".date("d.m.Y H:i:s");
        $a=3;
        $b=4;
        $c=$a+$b;
        echo "<p>Rezultat je $c</p>";
        ?>
    </body>
</html>