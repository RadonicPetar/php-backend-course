<?php
session_start();


if($_SERVER['REQUEST_METHOD']=="GET"){
    if(!isset($_GET["id"])){
        header("Location: index.php");
        exit();
    }
    $id=$_GET["id"];

    $proizvod=null;

    foreach($_SESSION["proizvodi"] as $p){
        if($p["id"]==$id){
            $proizvod=$p;
            break;
        }
    }

    if(!$proizvod){
        echo "Proizvod nije pronađen";
        exit();
    }
}
else
    {
        // $stari_id=$_POST["stari_id"];

        // foreach($_SESSION["proizvodi"] as $key=>$pr){
        //     if($pr["id"]==$stari_id){
        //         $slikaIme=$_POST["stara_slika"];

        //         if($_FILES["slika"]["name"]!=""){
        //             $slikaIme=$_FILES["slika"]["name"];
        //             move_uploaded_file($_FILES["slika"]["tmp_name"],"slike/".$slikaIme);
        //         }

        //         $_SESSION["proizvodi"][$key]=[
        //                 "id"=>$_POST["id"],
        //                 "naziv"=>$_POST["naziv"],
        //                 "kolicina"=>$_POST["kolicina"],
        //                 "cijena"=>$_POST["cijena"],
        //                 "slika"=>$slikaIme
        //         ];

        //         break;
        //     }
        // }

        $id=$_POST["id"];

        foreach($_SESSION["proizvodi"] as &$pr){
            if($pr["id"]==$id){
                $slikaIme=$_POST["stara_slika"];

                if($_FILES["slika"]["name"]!=""){
                    $slikaIme=$_FILES["slika"]["name"];
                    move_uploaded_file($_FILES["slika"]["tmp_name"],"slike/".$slikaIme);
                }

                $pr["naziv"]=$_POST["naziv"];
                $pr["kolicina"]=$_POST["kolicina"];
                $pr["cijena"]=$_POST["cijena"];
                $pr["slika"]=$slikaIme;

                break;
            }
        }
    
        unset($pr);

    header("Location: index.php");
    exit();
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Proizvod</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
        <nav>
            <a href="index.php">Početna</a>
            <a href="ispisi.php">Ispis iz JSON-a</a>
            <a href="obrisi.php">Spremi i uništi session</a>
        </nav>

        <h2>Uređivanje proizvoda</h2>
        <form action="uredi.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="stari_id" value="<?= $proizvod["id"]; ?>">
            <input type="hidden" name="stara_slika" value="<?= $proizvod["slika"]; ?>">
            <label>ID:</label>
            <label><input type="text" name="id" value="<?= $proizvod["id"]; ?>" readonly></label>
            <label>Naziv:</label>
            <label><input type="text" name="naziv" value="<?= $proizvod["naziv"]; ?>"></label>
            <label>Količina:</label>
            <label><input type="number" name="kolicina" value="<?= $proizvod["kolicina"]; ?>"></label>
            <label>Cijena:</label>
            <label><input type="number" step="0.01" name="cijena" value="<?= $proizvod["cijena"]; ?>"></label>
            <label>Slika:</label>
            <input type="file" name="slika">
            <label><button type="submit">Spremi</button></label>
        </form>

       
    </body>
</html>