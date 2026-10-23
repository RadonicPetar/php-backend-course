<?php

class StaticKalkulator{

    public static function IzracunajPDV(float $iznos): float{
        return $iznos * 25/125;
    }
}

echo StaticKalkulator::IzracunajPDV(125);