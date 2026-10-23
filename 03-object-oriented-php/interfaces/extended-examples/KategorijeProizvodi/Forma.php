<?php
require_once "Kategorija.php";
require_once "Proizvod.php";
$kategorije=Kategorija::dohvatiSve();

if($_SERVER['REQUEST_METHOD']=="POST"){
    $naziv=$_POST["naziv"];
    $cijena=$_POST["cijena"];
    $kategorijaSifra=(int)$_POST["kategorijaSifra"];

    $kategorijaObj = Kategorija::pronadjiKategorijuPoSifri($kategorijaSifra);

    if($kategorijaObj !== null){
        $novipr=new Proizvod($naziv,$cijena,$kategorijaObj);
        $novipr->spremi();
    }
    
    header("Location: Forma.php");
}
?>
<!DOCTYPE HTML>
<html>
    <head>
        <title>unos</title>
        <style>
            body{
                font-family: Arial, Helvetica, sans-serif;
            }
            form{
                width: 50%;
            }

            form label{
                display: block;
                margin-top: 10px;
            }
            form input[type="text"],input[type="number"],select,button{
                padding: 7px;
            }
        </style>
    </head>
    <body>
        <h2>Unos proizvoda</h2>
        <form method="POST">
            <label>Naziv proizvoda:</label>
            <input type="text" name="naziv">
            <label>Cijena proizvoda:</label>
            <input type="number" name="cijena" step="0.01">
            <label>Kategorija:</label>
            <select name="kategorijaSifra">
            <?php foreach($kategorije as $k):?>
                <option value="<?= $k["sifra"]; ?>"><?= $k["naziv"]; ?></option>
            <?php endforeach; ?>
            </select>
            <label><button type="submit">Spremi</button></label>
        </form>
    </body>
</html>