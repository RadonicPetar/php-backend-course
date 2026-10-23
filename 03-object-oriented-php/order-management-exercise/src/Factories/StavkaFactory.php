<?php

namespace Factories;

use Exception;
use Models\Proizvod;
use Models\Usluga;

class StavkaFactory{

    public static function create(
        string $type,
        int $id,
        string $naziv,
        int $kolicina,
        float $cijena
    )
    {
        return match($type){
            "proizvod"=> new Proizvod(
                $id,$naziv,$kolicina,$cijena
            ),
            "usluga"=> new Usluga(
                $id,$naziv,$kolicina,$cijena
            ),
            default => throw new Exception("Nepoznata vrsta")
        };
    }
}