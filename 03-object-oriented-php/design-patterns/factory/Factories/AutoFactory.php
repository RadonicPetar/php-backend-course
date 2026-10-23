<?php

namespace Factory\Factories;

use Factory\Model\Auto;

class AutoFactory{
    public static function createBMW(): Auto{
        return new Auto("BMW");
    }

    public static function createAudi(): Auto{
        return new Auto("Audi");
    }

    public static function createRandomCar(): Auto{
        $auti=["KIA","Mercedes","Opel","Renol","VW"];

        $randomCar = $auti[array_rand($auti)];

        return new Auto($randomCar);
    }
}