<?php 

require_once "boostrap.php"; 


use Repository\TecajRepository;

$repo = new TecajRepository();
$tecajevi = $repo->getAll();


require_once "header.php"; 

?>
<main>

    <h2>Tečajevi</h2>

<table>
    <tr>
        <th>Tecaj ID</th>
        <th>Naziv</th>
        <th>Broj polaznika</th>
        <th>Polaznik ID</th>
    </tr>
    <?php foreach($tecajevi as $tecaj): ?>
        <tr>
            <td><?= $tecaj["TecajId"]; ?></td>
            <td><?= $tecaj["Naziv"]; ?></td>
            <td><?= $tecaj["BrojPolaznika"]; ?></td>
            <td><?= $tecaj["IdPolaznik"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>

</main>
<?php require_once "footer.php"; ?>