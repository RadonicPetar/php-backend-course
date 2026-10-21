<!DOCTYPE html>
<html>
    <head>
        <title>FOR petlja</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            h1{
                font-size: 2.2em;
            }
            h2{
                font-size: 2em;
            }

            table {
            width: 60%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            font-size: 12px;
            margin-top: 20px
            }

            th, td {
                padding: 10px;
                border: 1px solid #ccc;
                text-align: left;
            }

            th {
                background-color: #333;
                color: #fff;
            }

            .parni{
                background-color: red;
            }

            .neparni{
                background-color: greenyellow;
            }
        </style>
    </head>
    <body>
        <h1>Primjeri</h1>

        <?php
        echo "<h2>Primjer 1</h2>";

        for($broj=1;$broj<=10;$broj++){
            echo "<br>Broj je: ".$broj;
        }

        echo "<h2>Primjer 2</h2>";
        for($a=20;$a>=10;$a--){
            echo "<br>Broj a: ".$a;
            if($a==15){
                break;
            }
        }

        echo "<h2>Primjer 3 - continue</h2>";
        for($i=1;$i<=10;$i++){
            if($i==5){
                continue;
            }
            echo "<br>Vrijednost i: ".$i;
        }

        echo "<h2>Primjer 4 - continue</h2>";
        for($j=1;$j<=20;$j++){
            if($j%2==1){
                continue;
            }
            echo "<br>Vrijednost j: ".$j;
        }

        echo "<h2>Primjer 5</h2>";
        /*
        potrebno je ispisati brojeve od 1 do 30 u for petlji, te kod svakog broja ispisati da li je prost ili složen.
        napomena: složen je onaj broj koji ima više od 2 djelitelja
        */
        for($a=1;$a<=30;$a++){
            echo "<br>Broj: ".$a;
            $djelitelji=0;
            for($b=1;$b<=$a;$b++){
                if($a%$b==0){
                    $djelitelji++;
                }
            }

            // if($djelitelji>2)
            //     echo " - složen";
            // else
            //     echo " - prost";
            echo $djelitelji>2 ? " - složen" : " - prost";
        }

        echo "<h2>Primjer 6</h2>";
        /*
        preko for pelje potrebno je napraviti tablicu množenja:
        Tablica množenja do 10 x 10

        1   2   3   4   5 ...
        2   4   6   8  10 ...
        3   6   9  12  15 ...
        4   8  12  16  20 ...
        5  10  15  20  25 ...
		.....................
        */

        $limit=10;
        echo "<table>";
        for($m=1;$m<=$limit;$m++){
            echo "<tr>";
            for($n=1;$n<=$limit;$n++){
                echo "<td>".($m*$n)."</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
        ?>
    </body>
</html>