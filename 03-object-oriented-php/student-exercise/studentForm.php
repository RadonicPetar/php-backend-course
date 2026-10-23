<?php
require_once "header.php";
require_once "model/Student.php";

if($_SERVER['REQUEST_METHOD']=="POST"){

    $student = new Student();

    $student->setIme($_POST["ime"]);
    $student->setPrezime($_POST["prezime"]);
    $student->setJmbag($_POST["jmbag"]);
    $student->setGodinaStudija($_POST["godina"]);

    $student->spremi();

    echo "Student spremljen";
    header("refresh: 1; url=pregledStudenata.php");
}
?>
<h2>Unos studenta</h2>

<form method="POST">
    <label>Ime:</label>
    <label><input type="text" name="ime"></label>
    <label>Prezime:</label>
    <label><input type="text" name="prezime"></label>
    <label>JMBAG:</label>
    <label><input type="text" name="jmbag"></label>
    <label>Godina studija:</label>
    <label><input type="number" name="godina"></label>

    <label><button type="sumbit">Spremi studenta</button></label>
</form>
<?php require_once "footer.php"; ?>