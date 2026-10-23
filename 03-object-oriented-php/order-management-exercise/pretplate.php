<?php

require_once "boostrap.php";


use Services\JsonStorage;
use Iterators\JsonTableIterator;


$storage = JsonStorage::getInstance();
$message="";

$kupci=$storage->read("kupci.json");
$usluge=$storage->read("usluge.json");

if($_SERVER['REQUEST_METHOD']=="POST"){

    $pretplate=$storage->read("pretplate.json");

    $exists = false;

    foreach($pretplate as $pretplata){
        if($pretplata["kupacid"]==$_POST["kupacid"] && $pretplata["vrsta"]==$_POST["vrsta"]){
            $pretplata["pretplata"]=isset($_POST["pretplata"]);
            $exists=true;
        }
    }

    if(!$exists){
        $pretplate[]=[
            "kupacid"=>$_POST["kupacid"],
            "vrsta"=>$_POST["vrsta"],
            "pretplata"=>isset($_POST["pretplata"])
        ];
    }

    $storage->save("pretplate.json",$pretplate);

    if(isset($_POST["pretplata"])){
        $message="Pretplata aktivirana!";
    }
    else
        {
            $message="Pretplata deaktivirana!";
        }

}



$pretplate = $storage->read("pretplate.json");

//iterator
$iterator = new JsonTableIterator($pretplate);

function findKupac(array $kupci,int $id): string{
    foreach($kupci as $k){
        if($k["id"]==$id){
            return $k["naziv"];
        }
    }
    return "N/A";
}


require_once "header.php";
?>
<main class="container content">
    <h2>Pretplate</h2>

<p>
    Unos i ispis pretplata
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
    <label><input type="checkbox" name="pretplata" checked> Aktivna pretplata</label>
    <button type="submit">Spremi pretplatu</button>
</form>
<h3>Popis pretplata</h3>

<table>
    <tr>
        <th>Redni broj</th>
        <th>Kupac</th>
        <th>Vrsta</th>
        <th>Status</th>
    </tr>
    <?php foreach($iterator as $rb=>$pretplata): ?>
        <tr>
            <td><?= $rb; ?></td>
            <td><?= findKupac($kupci,$pretplata["kupacid"]); ?></td>
            <td><?= $pretplata["vrsta"]; ?></td>
            <td><?= $pretplata["pretplata"]  ? "Aktivna" : "Neaktivna"; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
    </main>
<?php
require_once "footer.php";
?>