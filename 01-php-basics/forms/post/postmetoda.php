<!DOCTYPE html>
<html>
    <head>
        <title>POST metoda</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <?php 
    include_once "sifarnici.php";
    ?>
    <h1>POST metoda</h1>
    <form method="POST" action="postposalji.php" enctype="multipart/form-data">
        <label>Ime:</label>
        <label><input type="text" name="ime" id="ime"></label>
        <label>Godine:</label>
        <label><input type="number" name="godine" id="godine" value="35"></label>
        <label>Grad:</label>
        <label>
            <select name="grad" id="grad">
                <option value="-1">--Odaberite--</option>
                <?php foreach($gradovi as $ozn=>$grad): ?>
                    <option value="<?= $ozn; ?>"><?= $grad; ?></option>
                <?php endforeach;?>
            </select>
        </label>
        <label>Spol:</label>
        <label>
            <input type="radio" name="spol" value="m"> Muški
            <input type="radio" name="spol" value="z"> Ženski
        </label>
        <label>Sportovi:</label>
        <?php foreach($sportovi as $oznsport=>$nazivsport): ?>
            <label><input type="checkbox" name="sport[]" value="<?= $oznsport; ?>"><?= $nazivsport; ?></label>
        <?php endforeach; ?>
        <label>Slika:</label>
        <label><input type="file" name="datoteka"></label>
        <label>Kratak opis:</label>
        <label><textarea name="opis" rows="15" cols="25"></textarea></label>
        <label><input type="submit" value="Pošalji"></label>
    </form>
    </body>
</html>