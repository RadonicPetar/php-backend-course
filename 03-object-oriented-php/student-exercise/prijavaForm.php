<?php
require_once "header.php";
require_once "model/Student.php";
require_once "model/Ispit.php";
require_once "model/StudentIspit.php";

$studentObj=new Student();
$studenti = $studentObj->dohvatiSve();

$ispitObj=new Ispit();
$ispiti = $ispitObj->dohvatiSve();

if($_SERVER['REQUEST_METHOD']=="POST"){

    $prijava = new StudentIspit();

    $prijava->prijavi(
        $_POST["jmbag"],
        $_POST["sifra_ispita"]
    );
   
    echo "Ispit spremljen";
    header("refresh: 1; url=pregledPrijava.php");
}
?>
<h2>Unos studenta</h2>

<form method="POST">
    <label>Student:</label>
    <label>
        <select name="jmbag">
            <?php foreach($studenti as $student):?>
                <option value="<?= $student["jmbag"]; ?>">
                    <?= $student["ime"]." ".$student["prezime"]; ?>
                </option>
            <?php endforeach;?>
        </select>
    </label>
    <label>Ispit:</label>
    <label>
        <select name="sifra_ispita">
            <?php foreach($ispiti as $ispit):?>
                <option value="<?= $ispit["sifra"]; ?>">
                    <?= $ispit["naziv"]; ?>
                </option>
            <?php endforeach;?>
        </select>
    </label>

    <label><button type="sumbit">Prijavi ispit</button></label>
</form>
<?php require_once "footer.php"; ?>