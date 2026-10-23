<?php

require_once "bootstrap.php";

$user = new User("Marko","marko@mail.com");
echo $user->info();

echo Helper::formatirajTeskt("zAgREb");
echo Helper::korijenBroja(25);


$pr = new Proizvod("Jabuka");
$pr->ispisi();