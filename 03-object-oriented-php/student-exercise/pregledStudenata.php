<?php
require_once "header.php";
require_once "model/Student.php";

$studenti = Student::dohvatiSve();

?>
<h2>Pregled studenta</h2>

<table>
    <tr>
        <th>Ime</th>
        <th>Prezime</th>
        <th>JMBAG</th>
        <th>Godina</th>
    </tr>
    
    <?php foreach($studenti as $student): ?>
        <tr>
            <td><?= $student["ime"]; ?></td>
            <td><?= $student["prezime"]; ?></td>
            <td><?= $student["jmbag"]; ?></td>
            <td><?= $student["godina"]; ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<?php require_once "footer.php"; ?>