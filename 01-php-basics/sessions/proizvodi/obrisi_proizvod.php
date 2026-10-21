<?php

session_start();

if(isset($_GET["id"])){

    $id=$_GET["id"];

    foreach($_SESSION["proizvodi"] as $key=>$pr){
        if($pr["id"]==$id){
            unset($_SESSION["proizvodi"][$key]);
            break;
        }
    }

    $_SESSION["proizvodi"]=array_values($_SESSION["proizvodi"]);
    header("Location: index.php");
    exit();
}

?>