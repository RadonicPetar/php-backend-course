<!DOCTYPE html>
<html>
    <head>
        <title>Datumi u PHP-u</title>
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
        <h1>Datum</h1>

        <?php
        $datum = date("d.m.Y");
        echo "<br>Datum: ".$datum;

        $dd=date("d");
        $mm=date("m");
        $gg=date("Y");

        echo "<br>Dijelovi datuma: ";
        echo "<br>Dan: ".$dd;
        echo "<br>Mjesec: ".$mm;
        echo "<br>Godina: ".$gg;

        echo "<p>Godine:</p>";

        echo "<select>";
        for($god=2000;$god<=$gg;$god++){
            echo "<option value='{$god}'>$god</option>";
        }
        echo "</select>";
        ?>

        <h1>Vrijeme</h1>

        <?php
        $vrijeme = date("H:i:s");
         echo "<br>Vrijeme: ".$vrijeme;

         $timestamp = date("d.m.Y H:i:s");
         echo "<br>Timestamp: ".$timestamp;

         $datumzasql=date("Y-m-d");
         echo "<br>Datum za sql: ".$datumzasql;

         $datumunos="21.04.2017";
         echo "<br>Datum unos: ".$datumunos;
         $datumunossql=date("Y-m-d",strtotime($datumunos));
          echo "<br>Datum unos sql: ".$datumunossql;

          $datumunos="21.04.2017 15:38:22";
         echo "<br>Datum unos: ".$datumunos;
         $datumunossql=date("Y-m-d H:i:s",strtotime($datumunos));
          echo "<br>Datum unos sql: ".$datumunossql;

          $godinaunos=date("Y",strtotime($datumunos));
          echo "<br>Godina unosa: ".$godinaunos;

          $danunosa=date("l",strtotime($datumunos));
          echo "<br>Dan unosa: ".$danunosa;

          $mjesecunosa=date("F",strtotime($datumunos));
          echo "<br>Mjesec unosa: ".$mjesecunosa;
        ?>

    </body>
</html>