<?php

class StaticBrojac{

    public static int $broj = 0;

    public static function povecaj(): void{
        self::$broj++;
    }
}

StaticBrojac::povecaj();
StaticBrojac::povecaj();

echo StaticBrojac::$broj;