<?php

require_once "Model/Proizvod.php";

// use Model\Proizvod;

// $pr = new Proizvod("Jabuka");
// $pr->ispisi();

use Model\Proizvod as Pro;

$pr = new Pro("Jabuka");
$pr->ispisi();