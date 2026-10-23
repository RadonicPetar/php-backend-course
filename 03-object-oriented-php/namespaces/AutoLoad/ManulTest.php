<?php

require_once "classes/User.php";
require_once "classes/Helper.php";

$user = new User("Marko","marko@mail.com");
echo $user->info();

echo Helper::formatirajTeskt("zAgREb");
echo Helper::korijenBroja(25);