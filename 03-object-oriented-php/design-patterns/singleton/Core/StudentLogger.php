<?php

namespace Singleton\Core;

use DateTime;
use Exception;

class StudentLogger{
    private static ?StudentLogger $instance = null;

    private function __construct(){
        echo "Logger objekt kreiran!";
    }

    public static function getInstance(): StudentLogger{
        if(self::$instance === null){
            self::$instance = new StudentLogger();
        }

        return self::$instance;
    }

    public function logStudent(string $naziv): void{
        $vrijeme = new DateTime();
        $zapis = $vrijeme->format("d.m.Y H:i:s.u");
        echo "<br>Studnet {$naziv} je upisan u {$zapis}";
    }

    public function __clone(){
        throw new Exception("Clone Singleton objekta nije dozvoljen");
    }
}