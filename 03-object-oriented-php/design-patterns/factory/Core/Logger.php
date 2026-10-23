<?php

namespace Factory\Core;

class Logger{
    private static ?Logger $instance = null;

    private function __construct(){

    }

    public static function getInstance(): Logger{
        if(self::$instance === null){
            self::$instance = new Logger();
        }

        return self::$instance;
    }

    public function log(string $poruka): void{
        echo "<br>LOG: {$poruka}";
    }
}