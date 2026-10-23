<?php
require_once "header.php";
require_once "model/Ispit.php";

$ispiti = Ispit::dohvatiSve();

?>
<h2>Pregled ispita</h2>

<table>
    <tr>
        <th>Šifra</th>
        <th>Naziv</th>
        <th>Datum</th>
    </tr>
    
    <?php foreach($ispiti as $ispit): ?>
        <tr>
            <td><?= $ispit["sifra"]; ?></td>
            <td><?= $ispit["naziv"]; ?></td>
            <td><?= date("d.m.Y",strtotime($ispit["datum"])); ?></td>
        </tr>
    <?php endforeach; ?>

</table>

<?php require_once "footer.php"; ?>