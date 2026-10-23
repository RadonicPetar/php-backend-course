<?php

namespace App\Services;

class VozilaService{
    public static function dohvatiAutomobile(): array
    {
        $putanja = storage_path('app/automobili.json');
        $json = file_get_contents($putanja);
        return json_decode($json,true);
    }

    public static function dohvatiVlasnike(): array
    {
        $putanja = storage_path('app/vlasnici.json');
        $json = file_get_contents($putanja);
        return json_decode($json,true);
    }
    
    public static function dohvatiVlasnikaPoid(int $idVlasnika, array $vlasnici): ?array
    {
        foreach($vlasnici as $vlasnik){
            if($vlasnik['id']==$idVlasnika){
                return $vlasnik;
            }
        }
        return null;
    }
}