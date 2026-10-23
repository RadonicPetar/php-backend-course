<?php 

require_once "boostrap.php"; 

use Models\Kategorija;
use Repository\KategorijaRepository;
//use Exception;

$repo = new KategorijaRepository();

$message = "";
$edit = false;

$naziv=$_POST["naziv"] ?? "";
$opis=$_POST["opis"] ?? "";
$aktivna=isset($_POST["aktivna"]);

if(isset($_GET["edit"])){
    try {
        $edit = true;
        $kategorija = $repo->getById((int)$_GET["edit"]);
        if($kategorija){
            $id=$kategorija["id"];
            $naziv=$kategorija["naziv"];
            $opis=$kategorija["opis"];
            $aktivna=$kategorija["aktivna"];
        }
    } catch (Exception $ex) {
        throw new Exception("Greška kod editiranja: ".$ex->getMessage());
    }
}

if(isset($_GET["delete"])){
    $repo->delete((int)$_GET["delete"]);
    $message="Kategorija sa id-em ".$_GET["delete"]." uspješno obrisana";
}

if($_SERVER['REQUEST_METHOD']=="POST"){

    if(isset($_POST["id"])){
        $kategorija = new Kategorija(
            $_POST["id"],
            $naziv,
            $opis,
            $aktivna
        );
        $repo->update($kategorija);
        $message="Kategorija ažurirana";
    }
    else
        {
            $kategorija = new Kategorija(
                0,
                $naziv,
                $opis,
                $aktivna
            );

            $repo->insert($kategorija);
            $message="Kategorija uspješno spremljena";
        }
            $naziv=$opis="";
            $aktivna = false;

}



if(isset($_GET["pojam"])){
    $kategorije = $repo->search($_GET["pojam"]);
}
else
    {
$kategorije=$repo->getAll();
    }


require_once "header.php"; 

?>
<main>

    <h2>Kategorije</h2>

    <?php if($message): ?>
        <div class="success">
            <?= $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="kategorije.php">
        <?php if($edit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
        <?php endif; ?>
        <label>Naziv</label>
        <input type="text" name="naziv" value="<?= $naziv ?>">
        <label>Opis</label>
        <textarea name="opis"><?= $opis ?></textarea>
        <div class="checkbox-group">
            <input type="checkbox" name="aktivna" id="aktivna" <?= $aktivna ? "checked" : ""; ?>><label>Aktivna</label>
        </div>
        <button type="submit">
            <?php
            if($edit)
                echo "Ažuriraj";
            else
                echo "Spremi";
            ?>
        </button>
    </form>

    <h2>Pretraga</h2>
    <form method="GET" action="kategorije.php">
    <label>Pojam</label>
        <input type="text" name="pojam" value="">
        <button type="submit">
            Pretraži
        </button>
    </form>
<table>
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Opis</th>
        <th>Aktivna</th>
        <th>Akcija</th>
    </tr>
    <?php foreach($kategorije as $k): ?>
        <tr>
            <td><?= $k["id"]; ?></td>
            <td><?= $k["naziv"]; ?></td>
            <td><?= $k["opis"]; ?></td>
            <td><?= $k["aktivna"] ? "DA" : "NE"; ?></td>
            <td>
                <a href="kategorije.php?edit=<?= $k["id"]; ?>">Uredi</a> | 
                <a href="kategorije.php?delete=<?= $k["id"]; ?>">Briši</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</main>
<?php require_once "footer.php"; ?>