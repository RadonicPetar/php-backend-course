<?php

spl_autoload_register(function($className){
    $prefix = "Observers\\";
    $baseDir = __DIR__."/";

    if(strpos($className,$prefix)!==0){
        return;
    }

    $relativeClass = str_replace($prefix,"",$className);
    $file = $baseDir.str_replace("\\","/",$relativeClass).".php";

    if(file_exists($file)){
        require_once $file;
    }
    else
    {
        echo "Ne postoji datoteka {$file}!";
        exit;
    }

});