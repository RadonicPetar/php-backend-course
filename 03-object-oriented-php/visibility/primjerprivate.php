<?php

class Auto{
    private string $naziv;
}

$auto = new Auto();
$auto->naziv = "Golf";

echo "<br>Auto je: ".$auto->naziv;