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

        <h2>Operatori dodjeljivanja</h2>

        <?php
        $broj = 10;
        echo "<label>Broj:</label>".$broj;
        $temp = $broj;
        echo "<label>Temp:</label>".$temp;
        echo "<hr>";
        ?>

        <h2>Aritmetički operatori</h2>
        <?php
        // $broj1=20;
        // $broj2=7;

        $broj1=rand(10,20);
        $broj2=rand(10,20);
        echo "<label>Broj1:</label>".$broj1;
        echo "<label>Broj12:</label>".$broj2;

        $rezultat = $broj1+$broj2;
        echo "<label>Rezultat zbroj:</label>".$rezultat;

        $rezultat = $broj1-$broj2;
        echo "<label>Rezultat razlika:</label>".$rezultat;

        $rezultat = $broj1*$broj2;
        echo "<label>Rezultat množenja:</label>".$rezultat;

        $rezultat = $broj1/$broj2;
        echo "<label>Rezultat dijeljenja:</label>".round($rezultat,3);

        $rezultat = $broj1%$broj2;
        echo "<label>Rezultat ostatak:</label>".$rezultat;
        echo "<hr>";
        ?>

        <h2>Logički operatori</h2>

        <h3>Operator AND</h3>

        <?php
            /*
            0-LAŽ (FALSE)
            1-ISTINA (TRUE)

                ULAZ1		ULAZ2		REZULTAT
                1			  1             1
                1			  0             0
                0			  1             0	  
                0			  0             0	  
            */
        
        $ulaz1 = 2;
        $ulaz2 = 4;
        $ulaz3 = 8;

        $rez = ($ulaz1>3 && $ulaz2>3);
        echo "<label>Rezultat:</label>";
        var_dump($rez);
        
        $rez = ($ulaz1>5 && $ulaz2>1);
        echo "<label>Rezultat:</label>";
        var_dump($rez);
        echo "<label>Vrijednost:</label>".(int)$rez; 
        
        //da li su svi parni brojevi
        $rez = ($ulaz1%2==0 && $ulaz2%2==0 && $ulaz3%2==0);
        echo "<label>Rezultat:</label>";
        var_dump($rez);
        echo "<label>Vrijednost:</label>".(int)$rez;
        ?>

        <h3>Operator OR</h3>

        <?php
        /*
        0-LAŽ (FALSE)
        1-ISTINA (TRUE)

            ULAZ1		ULAZ2		REZULTAT
            1			  1             1
            1			  0             1
            0			  1             1	  
            0			  0             0	  
        */

        $ulaz1 = rand(1,10);
        $ulaz2 = rand(1,10);
        $ulaz3 = rand(1,10);
        echo "<label>Brojevi:</label>".$ulaz1.",".$ulaz2.",".$ulaz3;

        $rez = ($ulaz1>3 || $ulaz2>3);
        echo "<label>Rezultat:</label>";
        var_dump($rez);

        //da li je ijedan ulaz paran?
        $rez = ($ulaz1%2==0 || $ulaz2%2==0 || $ulaz3%2==0);
        echo "<label>Rezultat:</label>";
        var_dump($rez);
        echo "<label>Vrijednost:</label>".(int)$rez;

        //da li je zbroj sva tri ulaza veći od 17 i da li je bar jedan paran?
        $rez = (($ulaz1+$ulaz2+$ulaz3) > 17 and ($ulaz1%2==0 or $ulaz2%2==0 or $ulaz3%2==0));
        echo "<label>Rezultat:</label>";
        var_dump($rez);

        echo "<hr>";

        ?>
        <h3>Operator NOT</h3>

        <?php

        /*
            !0-ISTINA (TRUE)
            !1-LAŽ (FALSE)
        */

        $izjava1 = isset($ulaz1);
        $izjava2 = isset($ulaz4);

        var_dump($izjava1);
        var_dump($izjava2);

        echo '<label>Varijabla $ulaz1 je postavljena: </label>'; var_dump(isset($ulaz1));
        echo '<label>Varijabla $ulaz1 nije postavljena: </label>'; var_dump(!isset($ulaz1));

        echo '<label>Varijabla $ulaz4 je postavljena: </label>'; var_dump(isset($ulaz4));
        echo '<label>Varijabla $ulaz4 nije postavljena: </label>'; var_dump(!isset($ulaz4));

        $izraz = !(5>3);
        echo "<label>Izraz:</label>"; var_dump($izraz);

        //zadane su vrijednosti varijabli:
        $a=5;
        $b=3;
        $c=4;
        $d=7;
        $e=10;

        //izračunati rezultat: ($a>$b) and $c>3 and (($a+$b+$c)>($e*$c)/2 or ($e+$b)>12 or $d > 4)
        $finalrez = ($a > $b) && $c>3 && (($a+$b+$c)>($e*$c)/2 || ($e + $b) > 12 || $d > 4);
        echo "<label>finalrez:</label>"; var_dump($finalrez);

        ?>
    </body>
</html>