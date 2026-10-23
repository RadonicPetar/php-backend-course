<?php
require_once "header.php";
require_once "model/Student.php";
require_once "model/Ispit.php";
require_once "model/StudentIspit.php";


$studenti = Student::dohvatiSve();
$ispiti = Ispit::dohvatiSve();
$prijave = StudentIspit::dohvatiSve();

?>
<h2>Pregled prijavljenih ispita</h2>

<table>
    <tr>
        <th>Student</th>
        <th>JMBAG</th>
        <th>Ispit</th>
        <th>Datum</th>
    </tr>
<?php   
foreach($prijave as $prijava){

    $studentPodaci=null;
    $ispitPodaci=null;

    foreach($studenti as $student){
        if($student["jmbag"]==$prijava["jmbag"]){
            $studentPodaci=$student;
            break;
        }
    }

    foreach($ispiti as $ispit){
        if($ispit["sifra"]==$prijava["sifra_ispita"]){
            $ispitPodaci=$ispit;
            break;
        }
    }

    if($studentPodaci && $ispitPodaci): ?>
        <tr>
            <td>
                <?= $studentPodaci["ime"]." ".$studentPodaci["prezime"]; ?>
            </td>
            <td>
                <?= $studentPodaci["jmbag"]; ?>
            </td>
            <td>
                <?= $ispitPodaci["naziv"]; ?>
            </td>
            <td>
                <?= date("d.m.Y",strtotime($ispitPodaci["datum"]));?>
            </td>
        </tr>

    <?php endif; ?>
    <?php
}
?>
</table>
<?php require_once "footer.php"; ?>