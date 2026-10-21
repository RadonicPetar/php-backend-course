<?php
$fileName=basename($_SERVER["SCRIPT_NAME"]);
?>
<!DOCTYPE html>
<html lang="hr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WebShop - početna stranica</title>
        <link rel="stylesheet" href="css/stil.css">
    </head>
    <body>
        <header>
            <h1>WebShop - izdvojeni header</h1>
            <p>Dobro došli na našu web trgovinu</p>
        </header>
    <?php require "izbornik.php"; ?>