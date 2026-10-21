<?php include "podaci.php"; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>::Vjezba ponavljanja::</title>
        <style>
            label{
                display: block;
                margin-top: 10px;
            }
        </style>
    </head>
    <body>
        <h1>Obrazac</h1>

        <form>
            <label>Ime i prezime:</label>
            <input type="text" name="imeprezime" value="<?php echo $imeprezime; ?>">

            <label>Email:</label>
            <input type="email" name="email" value="<?= $email; ?>">

            <label>Datum rođenja:</label>
            <input type="date" name="datumrodjenja" value="<?= $datrod; ?>">

            <label>Visina:</label>
            <input type="number" name="visina" step="0.01" value="<?= $visina; ?>">

            <label>Poruka:</label>
            <textarea name="poruka" cols="30" rows="10"><?= $poruka; ?></textarea>

            <label><button type="submit">Pošalji</button></label>

        </form>
        <?php
        echo "<br>Server name: ".$_SERVER["SERVER_NAME"];
        echo "<br>Skripta: ".basename($_SERVER['PHP_SELF']);
        ?>
        <hr>
        <?php
        echo var_dump($imeprezime);
        echo var_dump($email);
        echo var_dump($datrod);
        echo var_dump($poruka);
        echo var_dump($visina);
        ?>
    </body>
</html>