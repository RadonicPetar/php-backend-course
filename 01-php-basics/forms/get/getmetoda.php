<!DOCTYPE html>
<html>
    <head>
        <title>GET metoda</title>
        <link rel="stylesheet" href="stil.css">
    </head>
    <body>
    <h1>GET metoda - 1</h1>
    <form method="GET" action="getposalji.php">
        <label>Ime:</label>
        <label><input type="text" name="ime" id="ime"></label>
        <label>Godine:</label>
        <label><input type="number" name="godine" id="godine" value="35"></label>
        <label><input type="submit" name="FormaGet" value="Pošalji"></label>
    </form>

    <h1>GET metoda - 2</h1>
    <p><a href="getposalji.php?ime=Romano&godine=55&placa=3333&status=1">Klikni</a></p>
    </body>
</html>