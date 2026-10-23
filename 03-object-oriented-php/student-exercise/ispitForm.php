<?php
require_once "header.php";
require_once "model/Ispit.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $ispit = new Ispit();

    $ispit->sifra=$_POST["sifra"];
    $ispit->setNaziv($_POST["naziv"]);
    $ispit->setDatum($_POST["datum"]);

    $ispit->spremi();

    echo "Ispit spremljen";
    header("refresh: 1; url=pregledIspita.php");
}
?>
<h2>Unos studenta</h2>

<form method="POST">
    <label>Šifra ispita:</label>
    <label><input type="text" name="sifra"></label>
    <label>Naziv:</label>
    <label><input type="text" name="naziv"></label>
    <label>Datum ispita:</label>
    <label><input type="date" name="datum"></label>

    <label><button type="sumbit">Spremi ispit</button></label>
</form>
<?php require_once "footer.php"; ?>