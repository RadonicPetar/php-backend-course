<?php

class Helper{

    public static function formatirajTeskt(string $txt){
        return ucfirst(strtolower($txt));
    }

    public static function korijenBroja(int $broj){
        return sqrt($broj);
    }
}