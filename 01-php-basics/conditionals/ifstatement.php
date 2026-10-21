<!DOCTYPE html>
<html>
    <head>
        <title>IF Statement</title>
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
            .istina{
                color: green;
                font-weight: bold;
            }
            .laz{
                color: red;
                font-weight: bold;
            }
            .default{
                color: brown;
                font-weight: bold;
            }
        </style>
    </head>
    <body>
        <h1>IF bez vitičastih zagrada</h1>

        <?php
        echo "<label>Primjer1:</label>";
        $broj=10;
        if($broj>5)
            echo "<p class='istina'>Broj je veći od 5</p>";

        echo "<label>Primjer2:</label>";
        $broj=5;
        if($broj<-1 && $broj<-5)
            echo "<p class='istina'>Broj je manji od -5</p>";
            echo "<p class='default'>Ja ne zavisim od if uvjeta</p>";

        echo "<label>Primjer3 - if else:</label>";
        $broj=rand(10,20);
        if($broj>15)
            echo "<p class='istina'>Broj $broj je veći od 15</p>";
        else
            echo "<p class=\"laz\">Broj $broj nije veći od 15</p>";

        echo "<label>Primjer4 - if else:</label>";
        //osoba1 ima 18 godina, a osoba2 20. ako su obje punoljetne, mogu ući u klub, inače ne...
        $osoba1=18;
        $osoba2=20;
        if($osoba1>=18 && $osoba2>=18)
            echo "<p class='istina'>Obje su punoljetne i mogu ući u klub</p>";
        else
            echo "<p class='laz'>Obje nisu punoljetne i ne mogu ući u klub</p>";

        echo "<label>Primjer5 - if else:</label>";
        //Kupiti automobil ako ima više od 150 KS ili je prešao ispod 20000 km ili mu je motor dizel.
        //postaviti random vrijednosti za KS i km.       
        ?>

        <h1>IF sa vitičastim zagradama</h1>

        <?php
        echo "<label>Primjer6</label>";
        /*
        ukoliko je korisničko ime identično vrijednosti "admin" i lozinka jednaka vrijednosti administrator, te oznaka role 
        identična 1, tada ispisati:
        Vi ste admin!
        Imate sljedeće role: unos, ispis, ažuiranje, brisanje
        inače ispisati:
        Vi niste admin!
        Nemate pristup ovoj stranici!
        */
        $korime="admin";
        $lozinka="administrator";
        $identifikator=0;

        if($korime==="admin" && $lozinka=="administrator"){
            echo "<p class='istina'>Vi ste admin!</p>";
            echo "<p class='istina'>Imate sljedeće role: unos, ispis, ažuiranje, brisanje</p>";
            $identifikator++;
        }
        else
        {
            echo "<p class='laz'>Vi niste admin!</p>";
            echo "<p class='laz'>Nemate pristup ovoj stranici!</p>"; 
            $identifikator--; 
        }
        echo "<label>Identifikator: $identifikator </label>";

        echo "<label>Primjer7 - if,elseif,else</label>";

        $brojka=rand(9,12);
        echo "<p>Brojka: ".$brojka."</p>";

        if($brojka>10){
            echo "<p class='istina'>Brojka veća od 10</p>";
        }
        elseif($brojka<10){
            echo "<p class='istina'>Brojka manja od 10</p>";
        }
        else
        {
            echo "<p class='istina'>Brojka je jednaka 10</p>";
        }

        echo "<label>Primjer8 - ternarni operator</label>";

        $br=10;
        if($br%2==0){
            echo "<br>Paran";
        }
        else
        {
            echo "<br>Neparan";
        }

        //ternarni zapis
        echo ($br%2==0) ? "Tern - Paran" : "Tern - Neparan";

        //ispisati ime današnjeg dana na hrvatskom jeziku
        $day=date("l"); // L - (lowercase)
        echo "<br>Dan je: ".$day;

        if($day=="Monday"){
            $danCRO="Ponedjeljak";
        }
        elseif($day=="Tuesday"){
            $danCRO="Utorak";
        }
        elseif($day=="Wednesday"){
            $danCRO="Srijeda";
        }
        elseif($day=="Thursday"){
            $danCRO="Četvrtak";
        }
        elseif($day=="Friday"){
            $danCRO="Petak";
        }
        elseif($day=="Saturday"){
            $danCRO="Subota";
        }
        else{
            $danCRO="Nedjelja";
        }

        echo "<label>HR dan je: ".$danCRO."</label>";
        ?>

    </body>
</html>