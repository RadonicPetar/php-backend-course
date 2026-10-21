<!DOCTYPE html>
<html>
    <head>
        <title>PHP Operatori</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            label{
                margin-top: 10px;
                display: block;
                color: navy;
            }
            hr{
                width: 100%;
                margin: 30px 0;
            }
        </style>
    </head>
    <body>
        <h1>PHP Operatori</h1>

        <h2>Inkrementacijski operatori</h2>

        <?php

        echo "<label>Operator var++</label>";

        $x1=5;
        echo '<br>Varijabla x1 iznosi: '.$x1;
        echo '<br>Varijabla x1++ iznosi: '.$x1++;
        echo '<br>Varijabla x1 iznosi: '.$x1;
        echo '<br>Varijabla x1++ iznosi: '.$x1++;
        echo '<br>Varijabla x1++ iznosi: '.$x1++;

        echo "<label>Operator ++var</label>";
        $x2=20;
        echo '<br>Varijabla x2 iznosi: '.$x2;
        echo '<br>Varijabla ++x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++x2 iznosi: '.++$x2;
        echo '<br>Varijabla ++x2 iznosi: '.++$x2;

        echo "<label>Operator var--</label>";
        $x3=35;
        echo '<br>Varijabla x3 iznosi: '.$x3;
        echo '<br>Varijabla x3-- iznosi: '.$x3--;
        echo '<br>Varijabla x3-- iznosi: '.$x3--;
        echo '<br>Varijabla x3-- iznosi: '.$x3--;
        echo '<br>Varijabla x3-- iznosi: '.$x3--;

        echo "<label>Operator --var</label>";
        $x4=50;
        echo '<br>Varijabla x4 iznosi: '.$x4;       
        echo '<br>Varijabla --x4 iznosi: '.--$x4;       
        echo '<br>Varijabla --x4 iznosi: '.--$x4;       
        echo '<br>Varijabla --x4 iznosi: '.--$x4;       
        echo '<br>Varijabla --x4 iznosi: '.--$x4;
        
        echo "<hr>";
        ?>
        <h2>Operatori usporedbe</h2>

        <?php
        $broj1=rand(1,10);
        $broj2=rand(1,10);
        echo "<label>Brojevi:</label>".$broj1." i ".$broj2;

        echo "<p>Operator > : ($broj1 > $broj2): "; var_dump($broj1>$broj2)."</p>";
        echo "<p>Operator < : ($broj1 < $broj2): "; var_dump($broj1<$broj2)."</p>";
        echo "<p>Operator >= : ($broj1 >= $broj2): "; var_dump($broj1>=$broj2)."</p>";
        echo "<p>Operator <= : ($broj1 <= $broj2): "; var_dump($broj1<=$broj2)."</p>";
        $broj1=5;
        $broj2="5";
        echo "<p>Operator == : ($broj1 == $broj2): "; var_dump($broj1==$broj2)."</p>";
        echo "<p>Operator != : ($broj1 != $broj2): "; var_dump($broj1!=$broj2)."</p>";
        echo "<p>Operator === : ($broj1 === $broj2): "; var_dump($broj1===(int)$broj2)."</p>";
        echo "<p>Operator != : ($broj1 !== $broj2): "; var_dump($broj1!==$broj2)."</p>";
        ?>
        
    </body>
</html>