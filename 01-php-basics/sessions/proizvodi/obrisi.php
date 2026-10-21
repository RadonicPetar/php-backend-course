<?php

session_start();

if(isset($_SESSION["proizvodi"])){

    if(!is_dir("storage")){
        mkdir("storage");
    }

    file_put_contents("storage/proizvodi.json",json_encode($_SESSION["proizvodi"]),JSON_PRETTY_PRINT);
}

session_destroy();
echo "<p>Session uništen i podaci spremljeni u json</p>";

?>