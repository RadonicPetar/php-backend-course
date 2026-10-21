<!DOCTYPE html>
<html>
    <head>
        <title>SWITCH statement</title>
        <style>
            label{
                display: block;
            }

            .crvena{
                color: red;
            }

            .plava{
                color: blue;
            }

            .zelena{
                color: green;
            }

            .default{
                color: brown;
                font-weight: bold;
                text-decoration: underline;
            }
        </style>
    </head>
    <body>
        <h1>SWITCH primjeri</h1>
        <?php
         
            //zadana je sifra boje od 1 do 3:
        /*
            1-crvena
            2-plava
            3-zelena
        potrebno je ispitati vrijednost boje, te za dobivenu boju ispisati sljedeće:
        npr. za 1: Odabrana je crvena boja!
        DODATAK: definirati u css-u tri klase za 3 boje pa ih primjeniti ovisno o uvjetu
        tekst ispisati u labelama sa pripadajućom klasom
        DODATAK 2: za slučaj 2, ispisati kvadrat boje (2*2)
        */ 

        $boja=rand(1,5);

        switch($boja){
            case 1:
                echo "<p class='crvena'>1 - odabrana je crvena boja</p>";    
            break;
            case 2:
                echo "<p class='plava'>2 - odabrana je plava boja</p>";
                $kvadrat=$boja*$boja;
                echo "<label>Kvadrat: ".$kvadrat."</label>";    
            break;
            case 3:
                echo "<p class='zelena'>3 - odabrana je zelena boja</p>";    
                if(rand(10,20)>=15){
                    echo "<br>Random broj veći/jednak od 15";
                }
                else
                {
                    echo "<br>Random broj nije veći/jednak od 15"; 
                }
            break;
            default:
                echo "<p class='default'>Nije odgovarajuća boja</p>";
        }

        $danENG=date("l"); // L - (lowercase)
        echo "<br>Dan ENG je: ".$danENG;

            switch($danENG){

                case "Monday":
                $danCRO="Ponedjeljak";
                break;
                case "Tuesday":
                $danCRO="Utorak";
                break;
                case "Wednesday":
                $danCRO="Srijeda";
                break;
                case "Thursday":
                $danCRO="Četvrtak";
                break;
                case "Friday":
                $danCRO="Petak";
                break;
                case "Saturday":
                $danCRO="Subota";
                break;
                case "Sunday":
                $danCRO="Nedjelja";
                break;
            }

            echo "<br>Dan CRO: ".$danCRO;
        ?>
    </body>
</html>