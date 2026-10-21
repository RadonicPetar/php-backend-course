<!DOCTYPE html>
<html>

<head>
    <title>SESSIONS</title>
</head>

<body>
    <h1>SESSIONS PRIMJER 3</h1>

    <?php
    /*
    potrebno je napraviti html formu koja će slati korisničko ime studenta i ocjenu, te podatke spremati u sesiju
    sve podatke potrebno je ispisivati i slati unutar iste skripte u HTML tablicu.
    
    na kraju ispisati prosjek ocjena preko funkcije koja će vratiti prosjek
    */

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    echo "<p><a href='?unisti=1'>Uništi sessiju</a></p>";

    if (isset($_GET["unisti"])) {
        session_destroy();
        echo "<p>Sessija uništena!</p>";
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $korime = $_POST["korime"];
        $ocjena = $_POST["ocjena"];

        if (!empty($korime) && !empty($ocjena)) {
            $_SESSION[$korime] = $ocjena;
        }
    }

    function VratiProsjek()
    {
        $suma = 0;
        foreach ($_SESSION as $k => $v) {
            $suma += $v;
        }
        return $suma / count($_SESSION);
    }


    ?>

    <form action="<?= $_SERVER["PHP_SELF"]; ?>" method="POST">

        <p>Korisničko ime: <input type="text" name="korime"></p>
        <p>Ocjena: <br>
            <select name="ocjena">
                <?php for ($ocj = 1; $ocj <= 5; $ocj++): ?>
                    <option value="<?= $ocj; ?>"><?= $ocj; ?></option>
                <?php endfor; ?>
            </select>
        </p>
        <p><input type="submit" value="Izracun"></p>
    </form>

    <h2>Ispis spremljenih podataka</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Student</th>
                <th>Ocjena</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (count($_SESSION) > 0) {
                foreach ($_SESSION as $stud => $ocjena) {
                    echo "<tr>";
                    echo "<td>{$stud}</td>";
                    echo "<td>{$ocjena}</td>";
                    echo "</tr>";
                }
                echo "<tr>";
                echo "<td colspan='2'>Prosjek: " . VratiProsjek() . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</body>

</html>