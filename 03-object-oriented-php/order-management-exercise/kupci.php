<?php
require_once "boostrap.php";

use Models\Kupac;
use Services\JsonStorage;
use Iterators\JsonTableIterator;
use Exceptions\ValidationException;

$storage = JsonStorage::getInstance();
$errors = [];
$message="";

$naziv=$_POST["naziv"] ?? "";
$email=$_POST["email"] ?? "";
$aktivan=isset($_POST["aktivan"]);

if($_SERVER['REQUEST_METHOD']=="POST"){

    try{

        if(empty(trim($naziv))){
            throw new ValidationException("naziv","Naziv kupca je obavezan");
        }

        if(strlen($naziv)<3){
            throw new ValidationException("naziv","Naziv mora imati min. 3 znaka");
        }

        if(empty(trim($email))){
            throw new ValidationException("email","Email kupca je obavezan");
        }

        $kupci = $storage->read("kupci.json");

        $noviKupac = new Kupac(
            count($kupci)+1,
            $naziv,
            $aktivan,
            $email
        );

        $kupci[]=$noviKupac->toArray();

        $storage->save("kupci.json",$kupci);

        $message="Kupac uspješno spremljen!";

        $naziv=$email="";
        $aktivan=false;
    }
    catch(ValidationException $ex){
        $errors[]=$ex->getMessage();
    }

}

$kupci = $storage->read("kupci.json");

//iterator
$iterator = new JsonTableIterator($kupci);

require_once "header.php";
?>
<main class="container content">
    <h2>Kupci</h2>

<p>
    Unos i prikaz kupaca
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
    <label>Naziv kupca</label>
    <input type="text" name="naziv" value="<?= $naziv; ?>">
    <label>Email kupca</label>
    <input type="email" name="email" value="<?= $email; ?>">
    <label><input type="checkbox" name="aktivan" <?= $aktivan ? "checked" : ""?>> Aktivan</label>
    <button type="submit">Spremi kupca</button>
</form>

<h3>Popis kupaca</h3>

<table>
    <tr>
        <th>Redni broj</th>
        <th>ID</th>
        <th>Naziv</th>
        <th>Email</th>
        <th>Aktivan</th>
    </tr>
    <?php foreach($iterator as $rb=>$kupac): ?>
        <tr>
            <td><?= $rb; ?></td>
            <td><?= $kupac["id"]; ?></td>
            <td><?= $kupac["naziv"]; ?></td>
            <td><?= $kupac["email"]; ?></td>
            <td><?= $kupac["aktivan"] ? "DA" : "NE"; ?></td>
        </tr>
    <?php endforeach; ?>
</table>
</main>
<?php
require_once "footer.php";
?>