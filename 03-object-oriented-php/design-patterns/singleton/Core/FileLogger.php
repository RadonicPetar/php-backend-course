<?php

namespace Singleton\Core;

use DateTime;

class FileLogger{
    private static ?FileLogger $instance = null;
    private string $file;

    private function __construct(){
        $this->file = __DIR__."/../log.txt";
    }

    public static  function getInstance() : FileLogger {
        if(self::$instance===null){
            self::$instance=new FileLogger();
        }

        return self::$instance;
    }

    public function logiraj(string $poruka): void{
        $vrijeme = new DateTime();
        $zapis = $vrijeme->format("Y-m-d H:i:s.u");
        file_put_contents($this->file,$poruka.", ".$zapis.PHP_EOL,FILE_APPEND);
    }
}