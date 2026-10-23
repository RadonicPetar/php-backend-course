<?php

namespace Factory\Factories;

use Exception;
use Factory\Model\Admin;
use Factory\Model\Korisnik;

use DateTime;

class UserFactory{

    public static function create(string $tip, string $ime): object{
        try {
            if($tip==="admin"){
                self::logKreiranje("ADMIN",$ime);
                return new Admin($ime);
            }

            if($tip==="korisnik"){
                self::logKreiranje("KORISNIK",$ime);
                return new Korisnik($ime);
            }

            throw new Exception("Nepoznati tip korisnika");
        } catch (Exception $ex) {
            throw new Exception("Greška kod kreiranja korisnika: ".$ex->getMessage());
        }
    }

    private static function logKreiranje(string $tip, string $ime): void{
        $datum = new DateTime();

        $vrijeme = $datum->format("d.m.Y H:i:s.u");

        $log = $vrijeme." | Kreiran {$tip} | Ime: {$ime}".PHP_EOL;

        file_put_contents(__DIR__."/../log.txt",$log,FILE_APPEND);
    }
}