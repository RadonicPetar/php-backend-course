<?php
session_start();
if (!isset($_SESSION["proizvodi"])) {
    $_SESSION["proizvodi"] = [];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Proizvod</title>
    <link rel="stylesheet" href="stil.css">
</head>

<body>
    <nav>
        <a href="index.php">Početna</a>
        <a href="ispisi.php">Ispis iz JSON-a</a>
        <a href="obrisi.php">Spremi i uništi session</a>
    </nav>

    <h2>Unos proizvoda</h2>
    <form action="spremi.php" method="POST" enctype="multipart/form-data">
        <label>ID:</label>
        <label><input type="text" name="id"></label>
        <label>Naziv:</label>
        <label><input type="text" name="naziv"></label>
        <label>Količina:</label>
        <label><input type="number" name="kolicina"></label>
        <label>Cijena:</label>
        <label><input type="number" step="0.01" name="cijena"></label>
        <label>Slika:</label>
        <input type="file" name="slika">
        <label><button type="submit">Spremi</button></label>
    </form>

    <h2>Proizvodi u SESSION-u</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Slika</th>
                <th>Akcija</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($_SESSION["proizvodi"] as $p): ?>
                <tr>
                    <td><?= $p["id"]; ?></td>
                    <td><?= $p["naziv"]; ?></td>
                    <td><?= $p["kolicina"]; ?></td>
                    <td><?= $p["cijena"]; ?></td>
                    <td><img src="slike/<?= $p["slika"]; ?>"></td>
                    <td>
                        <a href="obrisi_proizvod.php?id=<?= $p["id"]; ?>">Obriši</a>
                        <a href="uredi.php?id=<?= $p["id"]; ?>">Uredi</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>