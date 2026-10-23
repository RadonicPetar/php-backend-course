<?php

require_once "boostrap.php";

use Services\JsonStorage;
use Iterators\JsonTableIterator;
use Exceptions\ValidationException;
use Factories\StavkaFactory;
use Models\Usluga;

$storage = JsonStorage::getInstance();
$errors = [];
$message="";

$naziv=$_POST["naziv"] ?? "";
$kolicina=$_POST["kolicina"] ?? "";
$cijena=$_POST["cijena"] ?? "";

if($_SERVER['REQUEST_METHOD']=="POST"){

    try{

        if(empty(trim($naziv))){
            throw new ValidationException("naziv","Naziv usluge je obavezan");
        }

        if(empty($kolicina)){
            throw new ValidationException("kolicina","Količina je obavezna");
        }

        if($kolicina<=0){
            throw new ValidationException("kolicina","Količina mora biti veća od 0");
        }

        if(empty($cijena)){
            throw new ValidationException("cijena","Cijena je obavezna");
        }

        if($cijena<=0){
            throw new ValidationException("cijena","Cijena mora biti veća od 0");
        }

        $usluge = $storage->read("usluge.json");

        $usluga = StavkaFactory::create(
            "usluga",
            count($usluge)+1,
            $naziv,
            (int)$kolicina,
            (float)$cijena
        );

        $usluge[]=$usluga->toArray();

        $storage->save("usluge.json",$usluge);

        $message="Usluga uspješno spremljena!";

        $naziv=$kolicina=$cijena="";
    }
    catch(ValidationException $ex){
        $errors[]=$ex->getMessage();
    }

}

$usluge = $storage->read("usluge.json");

//iterator
$iterator = new JsonTableIterator($usluge);

require_once "header.php";
?>
<main class="container content">
    <h2>Usluge</h2>

<p>
    Unos i ispis usluga
</p>

<?php foreach($errors as $error): ?>
    <div class="error">
        <?= $error; ?>
    </div>
<?php endforeach; ?>

<?php if($message): ?>
    <div class="success">
        <?= $message ?>
    </div>
<?php endif;?>

<form method="POST">
    <label>Naziv usluge</label>
    <input type="text" name="naziv" value="<?= $naziv; ?>">
    <label>Količina</label>
    <input type="number" name="kolicina" value="<?= $kolicina; ?>">
    <label>Cijena</label>
    <input type="number" name="cijena" step="0.01" value="<?= $cijena; ?>">
    <button type="submit">Spremi uslugu</button>
</form>
<h3>Popis usluga</h3>

<table>
    <tr>
        <th>Redni broj</th>
        <th>ID</th>
        <th>Naziv</th>
        <th>Količina</th>
        <th>Cijena</th>
        <th>Ukupno</th>
    </tr>
    <?php foreach($iterator as $rb=>$usluga): ?>
        <tr>
            <td><?= $rb; ?></td>
            <td><?= $usluga["id"]; ?></td>
            <td><?= $usluga["naziv"]; ?></td>
            <td><?= $usluga["kolicina"]; ?></td>
            <td><?= $usluga["cijena"]; ?></td>
            <td><?= $usluga["kolicina"]*$usluga["cijena"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    </main>
<?php
require_once "footer.php";
?>