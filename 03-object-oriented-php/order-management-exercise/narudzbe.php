<?php

require_once "boostrap.php";

use Models\Narudzba;
use Services\JsonStorage;
use Iterators\JsonTableIterator;
use Exceptions\ValidationException;


$storage = JsonStorage::getInstance();
$errors = [];
$message="";

$kupci=$storage->read("kupci.json");
$proizvodi=$storage->read("proizvodi.json");
$usluge=$storage->read("usluge.json");

if($_SERVER['REQUEST_METHOD']=="POST"){

    $narudzbe=$storage->read("narudzbe.json");

    $narudzba = new Narudzba(
        count($narudzbe)+1,
        date("Y-m-d H:i:s"),
        $_POST["kolicina"],
        $_POST["kupacid"],
        $_POST["stavkaid"],
        $_POST["vrsta"]

    );

    $narudzbe[]=$narudzba->toArray();

    $storage->save("narudzbe.json",$narudzbe);

    $message="Narudžba spremljena!";

}

$narudzbe = $storage->read("narudzbe.json");

//iterator
$iterator = new JsonTableIterator($narudzbe);

function findKupac(array $kupci,int $id): string{
    foreach($kupci as $k){
        if($k["id"]==$id){
            return $k["naziv"];
        }
    }
    return "N/A";
}

function findStavka(array $items,int $id): string{
    foreach($items as $i){
        if($i["id"]==$id){
            return $i["naziv"];
        }
    }
    return "N/A";
}

require_once "header.php";
?>
<main class="container content">
    <h2>Narudžbe</h2>

<p>
    Unos i ispis narudžbi
</p>

<?php if($message): ?>
    <div class="success">
        <?= $message ?>
    </div>
<?php endif;?>

<form method="POST">
    <label>Kupac</label>
    <select name="kupacid">
        <?php foreach($kupci as $kupac): ?>
            <option value="<?= $kupac["id"] ?>"><?= $kupac["naziv"] ?></option>
        <?php endforeach; ?>
    </select>
    <label>Vrsta</label>
    <select name="vrsta" id="vrsta">
        <option value="proizvod">Proizvod</option>
        <option value="usluga">Usluga</option>
    </select>
    <div id="proizvodiBox">
        <label>Proizvod</label>
        <select name="stavkaid">
         <?php foreach($proizvodi as $p): ?>
            <option value="<?= $p["id"] ?>"><?= $p["naziv"] ?></option>
        <?php endforeach; ?>           
        </select>
    </div>
    <div id="uslugeBox" style="display: none;">
        <label>Usluga</label>
        <select name="stavkaid">
         <?php foreach($usluge as $u): ?>
            <option value="<?= $u["id"] ?>"><?= $u["naziv"] ?></option>
        <?php endforeach; ?>           
        </select>
    </div>
    <label>Količina</label>
    <input type="number" name="kolicina" value="<?= $kolicina; ?>">
    <button type="submit">Spremi narudžbu</button>
</form>
<h3>Popis narudžbi</h3>

<table>
    <tr>
        <th>Redni broj</th>
        <th>Datum</th>
        <th>Kupac</th>
        <th>Vrsta</th>
        <th>Naziv</th>
        <th>Količina</th>
    </tr>
    <?php foreach($iterator as $rb=>$nar): ?>
        <tr>
            <td><?= $rb; ?></td>
            <td><?= $nar["datum_narudzbe"]; ?></td>
            <td><?= findKupac($kupci,$nar["kupacid"]); ?></td>
            <td><?= $nar["vrsta"]; ?></td>
            <td><?= $nar["vrsta"] == "proizvod" ? findStavka($proizvodi,$nar["vrstaid"]) : findStavka($usluge,$nar["vrstaid"]); ?></td>
            <td><?= $nar["kolicina"]; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    </main>

    <script>
        const vrsta =document.getElementById("vrsta");
        const proizvodiBox =document.getElementById("proizvodiBox");
        const uslugeBox =document.getElementById("uslugeBox");

        vrsta.addEventListener(
            "change",
            function(){
                if(this.value == "proizvod"){
                    proizvodiBox.style.display="block";
                    uslugeBox.style.display="none";
                }
                else
                {
                    proizvodiBox.style.display="none";
                    uslugeBox.style.display="block";
                }
            }
        );
    </script>
<?php
require_once "footer.php";
?>