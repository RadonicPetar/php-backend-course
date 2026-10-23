<?php

require "src/App/User.php";
require "vendor/Lib/User.php";

echo "<h2>Puno kvalificirano ime (FQN)</h2>";

echo (new \App\User())->whoami();
echo "<br>";
echo (new \Lib\User())->whoami();

echo "<h2>Import + Alias</h2>";

use App\User as AppUser;
use Lib\User as LibUser;

echo (new AppUser())->whoami();
echo "<br>";
echo (new LibUser())->whoami();

echo "<h2>Standardni način instanciranja klase</h2>";

$us1 = new AppUser();
echo $us1->whoami();
echo "<br>";
$us2 = new LibUser();
echo $us2->whoami();
echo "<br>Korijen: ".$us2->VratiKorijen();