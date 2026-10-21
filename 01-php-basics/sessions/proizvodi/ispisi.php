<?php
$putanja = "storage/proizvodi.json";
if (!file_exists($putanja)) {
    echo "Nema podataka!";
    exit();
}

$podaci = json_decode(file_get_contents($putanja), true);
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

    <h2>Proizvodi u JSON-u</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Naziv</th>
                <th>Količina</th>
                <th>Cijena</th>
                <th>Slika</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($podaci as $p): ?>
                <tr>
                    <td><?= $p["id"]; ?></td>
                    <td><?= $p["naziv"]; ?></td>
                    <td><?= $p["kolicina"]; ?></td>
                    <td><?= $p["cijena"]; ?></td>
                    <td><img src="slike/<?= $p["slika"]; ?>"></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>