<?php

require_once "IJsonModel.php";
require_once "AbsProvjera.php";

class Kategorija extends AbsProvjera implements IJsonModel{

    private int $sifra;
    private string $naziv;

    protected static string $fileName = "kategorijenew.json";

    public function __construct(string $naziv){
        $this->naziv=$naziv;
        $this->sifra = $this->getNextId();
    }

    public function getSifra(): int{
        return $this->sifra;
    }

    public function setSifra(int $sifra){
        $this->sifra=$sifra;
    }

    public static function pronadjiKategorijuPoSifri(int $sifra): ?Kategorija{
        $kategorije = self::dohvatiSve();
        foreach($kategorije as $k){
            if($k["sifra"]==$sifra){
                $kat=new Kategorija($k["naziv"]);
                $kat->setSifra($k["sifra"]);

                return $kat;
            }
        }
        return null;
    }

    public function getNextId(): int{
        $putanja = self::getPutanja();

        if(!file_exists($putanja)){
            return 1;
        }

        $data = json_decode(file_get_contents($putanja),true);
        $ids = array_column($data,"sifra");

        return empty($ids) ? 1 : max($ids)+1;
    }

    public static function ProvjeriPostojanje(): void{}

    public function spremi(): void{

        $putanja = self::getPutanja();
        if(file_exists($putanja)){
            $data = json_decode(file_get_contents($putanja),true) ?? [];
        }

        $data[]=[
            "sifra"=>$this->sifra,
            "naziv"=>$this->naziv
        ];
        
        file_put_contents($putanja,json_encode($data,JSON_PRETTY_PRINT));
    }

    public static function dohvatiSve(): array{
        $putanja = self::getPutanja();

        if(!file_exists($putanja)){
            return [];
        }

        return json_decode(file_get_contents($putanja),true) ?? [];
    }
}