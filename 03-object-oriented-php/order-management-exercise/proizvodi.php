<?php

require_once "boostrap.php";

use Services\JsonStorage;
use Iterators\JsonTableIterator;
use Exceptions\ValidationException;
use Factories\StavkaFactory;
use Models\Proizvod;
use Models\Kupac;
use Services\ProductNotificationService;

$storage = JsonStorage::getInstance();
$errors = [];
$message="";
$notifications=[];
$naziv=$_POST["naziv"] ?? "";
$kolicina=$_POST["kolicina"] ?? "";
$cijena=$_POST["cijena"] ?? "";

if($_SERVER['REQUEST_METHOD']=="POST"){

    try{

        if(empty(trim($naziv))){
            throw new ValidationException("naziv","Naziv proizvoda je obavezan");
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

        $proizvodi = $storage->read("proizvodi.json");

        $proizvod = StavkaFactory::create(
            "proizvod",
            count($proizvodi)+1,
            $naziv,
            (int)$kolicina,
            (float)$cijena
        );

        $proizvodi[]=$proizvod->toArray();

        $storage->save("proizvodi.json",$proizvodi);

        $message="Proizvod uspješno spremljen!";

        $pretplate=$storage->read("pretplate.json");

        $notificationService = new ProductNotificationService();

        foreach($pretplate as $pretplata){
            if($pretplata["vrsta"]=="proizvod" && $pretplata["pretplata"]){
                foreach($storage->read("kupci.json") as $k){
                    if($k["id"]==$pretplata["kupacid"]){
                        $kupac = new Kupac(
                            $k["id"],
                            $k["naziv"],
                            $k["aktivan"],
                            $k["email"]
                        );
                        $notificationService->attach($kupac);
                    }
                }
            }
        }



        $notifications=$notificationService->notify("Dodan je novi proizvod: ".$naziv);

        $naziv=$kolicina=$cijena="";
    }
    catch(ValidationException $ex){
        $errors[]=$ex->getMessage();
    }

}

$proizvodi = $storage->read("proizvodi.json");

//iterator
$iterator = new JsonTableIterator($proizvodi);

require_once "header.php";
?>
<main class="container content">
    <h2>Proizvodi</h2>

<p>
    Unos i ispis proizvoda
</p>

<?php foreach($notifications as $notification): ?>
    <div class="success">
        <?= $notification; ?>
    </div>
<?php endforeach; ?>

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
    <label>Naziv proizvoda</label>
    <input type="text" name="naziv" value="<?= $naziv; ?>">
    <label>Količina</label>
    <input type="number" name="kolicina" value="<?= $kolicina; ?>">
    <label>Cijena</label>
    <input type="number" name="cijena" step="0.01" value="<?= $cijena; ?>">
    <button type="submit">Spremi proizvod</button>
</form>
<h3>Popis proizvoda</h3>

<table>
    <tr>
        <th>Redni broj</th>
        <th>ID</th>
        <th>Naziv</th>
        <th>Količina</th>
        <th>Cijena</th>
        <th>Ukupno</th>
    </tr>
    <?php foreach($iterator as $rb=>$proizvod): ?>
        <tr>
            <td><?= $rb; ?></td>
            <td><?= $proizvod["id"]; ?></td>
            <td><?= $proizvod["naziv"]; ?></td>
            <td><?= $proizvod["kolicina"]; ?></td>
            <td><?= $proizvod["cijena"]; ?></td>
            <td><?= $proizvod["kolicina"]*$proizvod["cijena"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    </main>
<?php
require_once "footer.php";
?>