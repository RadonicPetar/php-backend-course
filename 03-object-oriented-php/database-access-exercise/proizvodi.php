<?php 

require_once "boostrap.php"; 

use Models\Proizvod;

use Repository\ProizvodRepository;
use Repository\KategorijaRepository;

$repo = new ProizvodRepository();
$kategorijerepo = new KategorijaRepository();



$id=0;
$naziv=$_POST["naziv"] ?? "";
$kolicina=$_POST["kolicina"] ?? 0;
$cijena=$_POST["cijena"] ?? 0;
$kategorijaid=$_POST["kategorijaid"] ?? 0;

if(!isset($_GET["updated"])){
    $_GET["updated"]=0;
}

$edit=false;
$message="";
$errors=[];
//DELETE

if(isset($_GET["delete"])){
    $repo->delete((int)$_GET["delete"]);
    $message="Proizvod uspješno obrisan";
}


//EDIT

if(isset($_GET["edit"])){
    $page=$_GET["page"];
    $edit=true;
    $product = $repo->getById((int)$_GET["edit"]);

    if($product){
        $id=$product["id"];
        $naziv=$product["naziv"];
        $kolicina=$product["kolicina"];
        $cijena=$product["cijena"];
        $kategorijaid=$product["kategorijaid"];
    }
}

//INSERT
if($_SERVER['REQUEST_METHOD']=="POST"){
    try{

        if(isset($_POST["id"])){
            $proizvod = new Proizvod(
                (int)$_POST["id"],
                $naziv,
                $kolicina,
                $cijena,
                $kategorijaid
            );
            $page=$_POST["page"];
            $id=$_POST["id"];
            $repo->update($proizvod);
            $message="Proizvod uspješno ažuriran!";
            header("Location: proizvodi.php?page=$page&updated=$id");
            exit();
        }
        else
        {
            $proizvod = new Proizvod(
                0,
                $naziv,
                $kolicina,
                $cijena,
                $kategorijaid
            );
            $repo->insert($proizvod);
            $message="Proizvod uspješno spremljen";
        }

        $naziv="";
        $kolicina=$cijena=0;
        $kategorijaid=0;
    }
    catch(Exception $ex){
        $errors[]=$ex->getMessage();
    }
}


/*
PAGING
*/

$limit = 5;

$page = $_GET["page"] ?? 1;

$page = (int)$page;

if($page<1){
    $page=1;
}

$totalProducts = $repo->countAll();
$totalPages = ceil($totalProducts/$limit);
$offset = ($page-1)*$limit;

//$proizvodi = $repo->getAll();
$proizvodi = $repo->getPaginated($limit,$offset);
$kategorije = $kategorijerepo->getAll();


require_once "header.php"; 

?>
<main>

    <h2>Proizvodi</h2>

    <?php if($message): ?>
        <div class="success">
            <?= $message; ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="proizvodi.php">
        <?php if($edit): ?>
            <input type="hidden" name="id" value="<?= $id ?>">
            <input type="hidden" name="page" value="<?= $page ?>">
        <?php endif; ?>
        <label>Naziv</label>
        <input type="text" name="naziv" value="<?= $naziv ?>">
        <label>Količina</label>
        <input type="number" name="kolicina" value="<?= $kolicina ?>">
        <label>Cijena</label>
        <input type="number" name="cijena" step="0.01" value="<?= $cijena ?>">
        <label>Kategorija</label>
        <select name="kategorijaid">
            <?php foreach($kategorije as $k):?>
                <option value="<?= $k["id"];?>"
                <?= $k["id"]==$kategorijaid ? "selected" : ""?>
                >
                <?= $k["naziv"];?></option>    
            <?php endforeach;?>    
        </select>
        <button type="submit">
            <?php
            if($edit)
                echo "Ažuriraj";
            else
                echo "Spremi";
            ?>
        </button>
    </form>

<table>
    <tr>
        <th>ID</th>
        <th>Naziv</th>
        <th>Količina</th>
        <th>Cijena</th>
        <th>Kategorija</th>
        <th>Akcija</th>
    </tr>
    <?php foreach($proizvodi as $p): ?>
        <tr <?= $_GET["updated"] == $p["id"] ? "class='updated'" : ""?>>
            <td><?= $p["id"]; ?></td>
            <td><?= $p["naziv"]; ?></td>
            <td><?= $p["kolicina"]; ?></td>
            <td><?= $p["cijena"]; ?></td>
            <td><?= $p["kategorija"]; ?></td>
            <td>
                <a href="proizvodi.php?edit=<?= $p["id"]; ?>&page=<?= $page; ?>">Uredi</a> | 
                <a href="proizvodi.php?delete=<?= $p["id"]; ?>">Briši</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<div class="pagination">
    <!-- PREV -->
     <?php if($page>1):?>
    <a href="proizvodi.php?page=<?= $page-1; ?>">&laquo; PREV</a>
     <?php endif; ?>  

     <!-- BROJEVI STRANICA -->
     <?php for($i=1;$i<=$totalPages;$i++): ?>   
    <a href="proizvodi.php?page=<?= $i ?>" class="<?= $i==$page ? 'active-page' : ''?>"><?= $i ?></a>
     <?php endfor; ?>   
    
     <!-- NEXT -->
     <?php if($page < $totalPages):?> 
    <a href="proizvodi.php?page=<?= $page + 1; ?>">&raquo; NEXT</a>
    <?php endif; ?> 
</div>

</main>
<?php require_once "footer.php"; ?>