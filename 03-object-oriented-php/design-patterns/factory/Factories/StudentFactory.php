<?php

namespace Factory\Factories;

use Exception;
use Factory\Model\IzvanredniStudent;
use Factory\Model\Student;
use Factory\Core\Logger;
class StudentFactory{
    public static function create(string $ime, string $tip): Student{

        Logger::getInstance()->log("Kreiran student {$ime}, tip {$tip}");

        if(strlen($ime)<2){
            throw new Exception("Ime mora imati minimalno 2 znaka");
        }

        if($tip==="redovni"){
            return new Student($ime);
        }
        if($tip==="izvanredni"){
            return new IzvanredniStudent($ime);
        }

        throw new Exception("{$ime} => Nepoznati tip studenta");
    }
}