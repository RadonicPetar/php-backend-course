<?php

try{
    throw new Exception("Greška u programu");
}
catch(Exception $e){
    echo $e->getMessage();
}