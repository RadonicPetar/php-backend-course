<!DOCTYPE html>
<html>
    <head>
        <title>WHILE petlja</title>
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
        $broj=1;
        while($broj<=10){
            echo "<br>Broj: ".$broj;
            $broj++;
        }

        echo "<h2>Primjer 2</h2>";
        //ispisati brojeve od 10 do -10 koji su zadani u varijablama
        $a=10;
        $b=-10;
        while($a>=$b){
            echo "<br>Vrijednost a: ".$a--;
            if($a<0){
                echo "<br>Prekid petlje";
                break;
            }
        }

        echo "<h2>Primjer 3</h2>";
        $uvjet = true;
        $ind=1;
        while($uvjet==true){
            echo "<br>Istina";
            $ind++;
            if($ind==3){
                $uvjet=false;
            }
        }

        echo "<h2>Primjer 4</h2>";
        /*
        potrebno je ispisati brojeve od 1 do 30, te ispisati:
        - zbroj svih parnih
        - koliko ima onih koji su djeljivi sa 3
        */

        $brojka=1;
        $brojacparnih=0;
        $djeljivihsatri=0;
        while($brojka <= 30){
            echo "<br>Brojka: ".$brojka;

            if($brojka%2==0){
                $brojacparnih++;
            }
            if($brojka%3==0){
                $djeljivihsatri++;
            }
            $brojka++;
        }

        echo "<br>Broj parnih: ".$brojacparnih;
        echo "<br>Broj djeljivih sa 3: ".$djeljivihsatri;

        echo "<h2>Primjer 5</h2>";
            /*
        potrebno je u html tablicu ispisati prvih 10 brojeva, zatim je potrebno u drugu kolonu izračunati korijen svakog broja
        zaokruženog na 3 decimale, a u treću kolonu ispisati da li je broj paran ili neparan.
        parne ćelije obojiti u crvenu boju, a neparne u zelenu.
        */
        ?>
        <table>
            <thead>
                <tr>
                    <th>Broj</th><th>Korijen</th><th>Parnost</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                $brojka=1;
                while($brojka<=10){
                    $korijen=round(sqrt($brojka),3);
                    if($brojka%2==0){
                        $parnost="Paran";
                        $klasa="parni";
                    }
                    else
                    {
                        $parnost="Neparan";
                        $klasa="neparni";
                    }
                ?>
                <tr class="<?= $klasa; ?>">
                    <td><?= $brojka; ?></td><td><?= $korijen; ?></td><td><?= $parnost; ?></td>
                </tr>
                <?php
                $brojka++; 
                }               
                ?>              
            </tbody>
        </table>

        <?php
        echo "<h2>Primjer 6</h2>";
        /*
        pomoću while petlje ispisati fibbonacijev niz ako su poznate prve dvije vrijednosti
        0,1 - ispisati niz do 800
        0,1,1,2,3,5,8,13,21,34,55....
        */
        $prvi=0;
        $drugi=1;
        $sljedeci=$prvi+$drugi;
        echo $prvi.", ".$drugi.", ";
        while($sljedeci < 800){
            echo $sljedeci.", ";
            $prvi=$drugi;
            $drugi=$sljedeci;
            $sljedeci=$prvi+$drugi;
        }
        ?>
    </body>
</html>